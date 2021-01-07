<?php

namespace App\Console\Commands;

use App\Mail\AdminDailyMail;
use App\Mail\UserCreated;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class dailyMailToAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'daily send email to admin with any registrations
    occurred in the last 24 hours';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        Mail::to('a.sherif7@yahoo.com')->send(new AdminDailyMail(User::find(1)));

    }
}
