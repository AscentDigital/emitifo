<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use App\Company;
use App\Subscriber;
use App\Message;

class InboundSmsController extends Controller
{
    public function receive(){
    	$inbound = \Nexmo\Message\InboundMessage::createFromGlobals();
		$code = $inbound['to'];
		$keyword = strtolower($inbound['keyword']);
		$from = $inbound['msisdn'];
		$text = $inbound['text'];
		$misc = array($inbound['messageId']);


		$companies = Company::where('code', $code)->get();
		foreach ($companies as $company) {
			$keywords = $company->keywords->where('keyword', $keyword);
			if($keywords->count() > 0){
				$inboxMessage = Message::create([
					'number' => $from,
					'message' => $text,
					'misc' => json_encode($misc),
					'type' => 'incoming',
					'campaign_id' => $keywords->first()->campaign_id,
					'company_id' => $keywords->first()->company_id,
					'status' => 'received'
				]);

				$subscriber = Subscriber::where('number', $from)->first();
				if($subscriber == null){
					$subscriber = Subscriber::create([
						'number' => $from
					]);
					$subscriber->companies()->attach($company);
				}else{
					if(!$subscriber->companies->contains($company)){
						$subscriber->companies()->attach($company);
					}
				}
			}

			foreach ($keywords as $keyword) {
				$result = Nexmo::message()->send([
				    'to' => $inbound['msisdn'],
				    'from' => $code,
				    'text' => $keyword->reply
				]);

				$price = 0;
				foreach ($result as $key => $value) {
					$price = $price + $value['message-price'];
				}

				$message = Message::create([
		            'number' => $from,
		            'message' => $keyword->reply,
		            'price' => $price,
		            'type' => 'outgoing',
		            'origin' => 'keyword',
		            'campaign_id' => $keyword->campaign_id,
		            'company_id' => $keyword->company_id,
		            'status' => 'sent'
		        ]);
			}
		}
    }
}