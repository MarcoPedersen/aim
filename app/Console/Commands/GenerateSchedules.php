<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\GameScheduleService;

class GenerateSchedules extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $fieldId = $this->ask('Which field do you want to create a schedule for?');
        $numberOfSchedules = $this->ask('how many schedules do you wish to generate?');
        $price = $this->ask('How much should the ticket cost?');
        $limit = $this->ask('How many spots are available?');
        $schedule = $this->choice('Which day of the week?', ['monday', 'tuesday', 'wednesday', 'thursday','friday','saturday','sunday']);

        $gameScheduleService = new GameScheduleService();
        $response = $gameScheduleService->generateGameSchedule($fieldId, $numberOfSchedules, $price, $limit, $schedule);


        dd($response);
    }
}
