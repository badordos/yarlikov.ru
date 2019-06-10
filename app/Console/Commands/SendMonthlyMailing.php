<?php

namespace App\Console\Commands;

use App\Jobs\SendEmail;
use App\Mail\LastMonthContent;
use App\Subscriber;
use Illuminate\Console\Command;

class SendMonthlyMailing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:monthly_mailing';

    private $subscribers;
    private $lastMonthContenteEmail;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create queue for other user - send email for all subscribers with content for last month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->subscribers = Subscriber::where('active', 1)->get();

        $this->lastMonthContenteEmail =  new LastMonthContent();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach ($this->subscribers as $subscriber) {

            dispatch(new SendEmail($subscriber->email, $this->lastMonthContenteEmail));

        }
    }
}
