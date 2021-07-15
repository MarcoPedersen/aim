<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class GameScheduleNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $game_schedule;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($game_schedule)
    {
        $this->game_schedule = $game_schedule;
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
                'date' => $this->game_schedule->date,
                'price' => $this->game_schedule->price,
                'limit' => $this->game_schedule->limit,
                'field_id' => $this->game_schedule->field_id,
                'link' => 'http://127.0.0.1:8000/player/fields'
            ]);
    }}
