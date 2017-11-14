<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Message;
use Nexmo\Laravel\Facade\Nexmo;

class RetrieveTextMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $id;
    protected $messageId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $messageId)
    {
        $this->id = $id;
        $this->messageId = $messageId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        try {
            $text = Nexmo::message()->search($this->messageId);
            $message = Message::find($this->id);
            $message->update([
                'message' => $text->getBody()
            ]);
        } catch (Exception $e) {
            
        }
    }
}
