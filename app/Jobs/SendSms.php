<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Nexmo\Laravel\Facade\Nexmo;
use App\Message;
use App\Company;
use App\SmsLog;
use Carbon\Carbon;
use Twilio\Rest\Client;
use Log;
class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $message;
    protected $smsLog;
    protected $company;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Message $message, SmsLog $smsLog, Company $company)
    {
        $this->message = $message;
        $this->smsLog = $smsLog;
        $this->company = $company;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        switch ($this->company->gateway) {
            case 'nexmo':
                $result = Nexmo::message()->send([
                    'to' => $this->smsLog->number,
                    'from' => $this->company->code,
                    'text' => $this->message->message
                ]);

                $price = 0;
                foreach ($result as $key => $value) {
                    $price = $price + $value['message-price'];
                }

                $misc = $result;
                break;
            
            case 'twilio':
                $twilio = new Client(env('TWILIO_SID', false), env('TWILIO_TOKEN', false));
                $result = $twilio->messages->create($this->smsLog->number, array(
                        "from" => $this->company->code,
                        "body" => $this->message->message
                    )
                );

                $attempts = 0;
                do{
                    $message_details = $twilio->messages($result->sid)->fetch();
                    $attempts++;
                }while($message_details->price == null && $attempts <= 5);
                
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
                Log::info($misc);
                break;
        }

        $this->smsLog->update([
            'price' => $price,
            'status' => 'sent',
            'date_sent' => Carbon::now()
        ]);

        $count = $this->message->logs()->where('status', 'sending')->count();
        $status = 'sending';
        if($count == 0){
            $status = 'sent';
        }
        $this->message->update([
            'price' => $this->message->price + $price,
            'status' => $status
        ]);
    }
}
