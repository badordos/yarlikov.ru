<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email;
    private $emailClass;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, Mailable $emailClass)
    {
        $this->email = $email;
        $this->emailClass = $emailClass;
    }

    /**
     * Execute the job.
     *
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send($this->emailClass);
    }
}
