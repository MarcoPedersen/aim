<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GameScheduleNotification extends Mailable
{
    use Queueable, SerializesModels;

    private $gameSchedule;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($gameSchedule)
    {
        $this->gameSchedule = $gameSchedule;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mail@example.com', 'GameScheduleNotification')
            ->subject('GameScheduleNotification Confirmation')
            ->markdown('mails.newGameMessage')
            ->with([
                'date' => $this->gameSchedule->date,
                'price' => $this->gameSchedule->price,
                'limit' => $this->gameSchedule->limit,
                'field_id' => $this->gameSchedule->field_id,
                'link' => 'http://127.0.0.1:8000/player/fields'
            ]);
    }
}
