<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Message;
use App\Company;
use App\SmsLog;
use App\Jobs\SendSms;

class ChunkifySubscribers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $message;
    protected $lists;
    protected $company;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Message $message, $lists, Company $company)
    {
        $this->message = $message;
        $this->lists = $lists;
        $this->company = $company;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->lists as $list) {
            switch ($list) {
                case 'value':
                    # code...
                    break;
                
                default:
                    $this->company->subscribers()->chunk(100, function($subscribers){
                        foreach ($subscribers as $subscriber) {
                            if(!$this->check($subscriber->number)){
                                $smsLog = SmsLog::create([
                                    'number' => $subscriber->number,
                                    'status' => 'sending',
                                    'message_id' => $this->message->id
                                ]);

                                $job = (new SendSms($this->message, $smsLog, $this->company));
                                dispatch($job);
                            }
                        }
                    });
                    break;
            }
        }
    }

    public function check($number){
        return $this->message->logs()->where('number', $number)->count();
    }
}
