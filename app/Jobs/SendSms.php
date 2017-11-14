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
        $result = Nexmo::message()->send([
            'to' => $this->smsLog->number,
            'from' => $this->company->code,
            'text' => $this->message->message
        ]);

        $price = 0;
        foreach ($result as $key => $value) {
            $price = $price + $value['message-price'];
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
