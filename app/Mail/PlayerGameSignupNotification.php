<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class playerGameSignupNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $gameSchedule;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $gameSchedule)
    {
        $this->user = $user;
        $this->gameSchedule = $gameSchedule;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mail@example.com', 'Mailtrap')
            ->subject('Player signup')
            ->markdown('mails.playerGameSignupNotification')
            ->with([
                'name' => $this->user->first_name,
                'date' => $this->gameSchedule->date,
                'number' => $this->gameSchedule->players->count(),
                'link' => 'http://127.0.0.1:8000/dashboard'
            ]);
    }}
