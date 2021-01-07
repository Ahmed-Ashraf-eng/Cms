<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
class AdminDailyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $users = User::orderBy('created_at', 'ASC')->where('role', '!=', 'admin')->get();
        $arrOfDates = [];
        foreach ($users as $user) {
            $arrOfDates[] = $user->created_at->format('l j-n-Y H:i:s');
        }
        $arrOfCounts = array_count_values($arrOfDates);

        $count = 0;
        foreach ($arrOfCounts as $key => $value) {
            if ($key > Carbon::now()->subDay(1)->format('l j-n-Y H:i:s') &&
                $key < Carbon::now()->format('l j-n-Y H:i:s')) {
                $count++;
            }
        }

        return $this->text('emails.adminMail' , ['count' => $count]);
    }
}
