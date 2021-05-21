<?php

namespace App\Console\Commands;

use App\Models\Field;
use Illuminate\Console\Command;
use App\Services\GameScheduleService;
use function PHPUnit\Framework\fileExists;

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
//        $fieldId = $this->argument('fieldId');

        $gameScheduleService = new GameScheduleService();
        $response = $gameScheduleService->generateGameSchedule($fieldId,$numberOfSchedules);


        dd($response);
    }
}
