<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use App\Company;
use App\Subscriber;
use App\Message;
use Twilio\Rest\Client;
use Log;

class InboundSmsController extends Controller
{
	public $code;
	public $keyword;
	public $from;
	public $text;
	public $misc;
	public $twilio;

    public function receive($key, $secret){
    	$companies = Company::where(['key' => $key, 'secret' => $secret])->get();
    	if($companies->count()){
    		$company = $companies->first();

    		$setRequests = $this->setRequests($company->gateway);
    		if($setRequests !== true){
    			return $setRequests;
    		}

			$keywords = $company->keywords->where('keyword', $this->keyword);
			if($keywords->count() > 0){
				$keyword = $keywords->first();
				$this->logInboundMessage($keyword);
				$this->newSubscription($company);
				$this->sendReply($company->gateway, $keyword);
			}
    	}else{
    		return $this->response('error', 'invalid api key or secret');
    	}
    }

    public function setRequests($gateway){
    	Log::info(request()->all());
    	switch ($gateway) {
			case 'nexmo':
				$nexmo_key = env('NEXMO_KEY', false);
				$nexmo_secret = env('NEXMO_SECRET', false);
				if($nexmo_key == false || $nexmo_secret == false){
					return $this->response('error', 'missing nexmo key or secret');
				}
				$inbound = \Nexmo\Message\InboundMessage::createFromGlobals();
				$this->code = $inbound['to'];
				$this->keyword = strtolower($inbound['keyword']);
				$this->from = $inbound['msisdn'];
				$this->text = $inbound['text'];
				$this->misc = array($inbound['messageId']);
				break;
			
			case 'twilio':
				$twilio_sid = env('TWILIO_SID', false);
				$twilio_token = env('TWILIO_TOKEN', false);
				if($twilio_sid == false || $twilio_token == false){
					return $this->response('error', 'missing twilio sid or token');
				}
				$from = request('From');
				$this->twilio = new Client($twilio_sid, $twilio_token);
				$this->code = request('To');
				$this->keyword = strtolower(strtok(request('Body'), " "));
				$this->from = $from;
				$this->text = request('Body');
				$this->misc = request()->all();
				break;
		}
		
		return true;
    }

    public function response($result, $message){
    	return array('result' => $result, 'message' => $message);
    }

    public function logInboundMessage($keyword){
    	$inboxMessage = Message::create([
			'number' => $this->from,
			'message' => $this->text,
			'misc' => json_encode($this->misc),
			'type' => 'incoming',
			'campaign_id' => $keyword->campaign_id,
			'company_id' => $keyword->company_id,
			'status' => 'received'
		]);
    }

    public function newSubscription($company){
    	$subscriber = Subscriber::where('number', $this->from)->first();
		if($subscriber == null){
			$subscriber = Subscriber::create([
				'number' => $this->from
			]);
			$subscriber->companies()->attach($company);
		}else{
			if(!$subscriber->companies->contains($company)){
				$subscriber->companies()->attach($company);
			}
		}
    }

    public function sendReply($gateway, $keyword){
    	switch ($gateway) {
    		case 'nexmo':
    			$result = Nexmo::message()->send([
				    'to' => $this->from,
				    'from' => $this->code,
				    'text' => $keyword->reply
				]);

				$price = 0;
				foreach ($result as $key => $value) {
					$price = $price + $value['message-price'];
				}
				$misc = $result;
    			break;
    		
    		case 'twilio':
    			$result = $this->twilio->messages->create($this->from, array(
			            "from" => $this->code,
			            "body" => $keyword->reply
			        )
			    );

			    $message_details = $this->twilio->messages($result->sid)->fetch();
			    $price = str_replace('-', '', $message_details->price);
			    $misc = array(
			    	'account_sid' => $message_details->accountSid,
			    	'api_version' => $message_details->apiVersion,
			    	'body' => $message_details->body,
			    	'error_code' => $message_details->errorCode,
			    	'error_message' => $message_details->errorMessage,
			    	'num_segments' => $message_details->numSegments,
			    	'num_media' => $message_details->numMedia,
			    	'date_created' => $message_details->dateCreated,
			    	'date_sent' => $message_details->dateSent,
			    	'date_updated' => $message_details->dateUpdated,
			    	'direction' => $message_details->direction,
			    	'from' => $message_details->from,
			    	'price' => $message_details->price,
			    	'sid' => $message_details->sid,
			    	'status' => $message_details->status,
			    	'to' => $message_details->to,
			    	'uri' => $message_details->uri
			    );
    			break;
    	}

    	$message = Message::create([
            'number' => $this->from,
            'message' => $keyword->reply,
            'price' => $price,
            'type' => 'outgoing',
            'origin' => 'keyword',
            'campaign_id' => $keyword->campaign_id,
            'company_id' => $keyword->company_id,
            'status' => 'sent',
            'misc' => json_encode($misc)
        ]);
    }

    public function test($sid){
    	$twilio_sid = env('TWILIO_SID', false);
		$twilio_token = env('TWILIO_TOKEN', false);
		$twilio = new Client($twilio_sid, $twilio_token);
		$result = $twilio
		    ->messages($sid)
		    ->fetch();
		dd($result);
    }
}