<?php

namespace App\Services;

use App\Models\Field;
use App\Models\GameSchedule;

class GameScheduleService
{
    public function generateGameSchedule($fieldId, $numberOfSchedules = 1, $price, $limit, $schedule)
    {
        $field = Field::find($fieldId);
        if (!$field) {
            return 'Field not found';
        }
        $givenDate = strtotime('now');
        for ($x = 0; $x < $numberOfSchedules; $x++) {
            $givenDate = $this->getDateSchedule($schedule, $givenDate);
            $formattedDate = date("Y-m-d H:i:s", $givenDate);
            $this->createGameSchedule($field, $price, $limit, $formattedDate);
        }
        return $field->name;
    }

    public function getDateSchedule($schedule, $givenDate)
    {
        return strtotime('next ' . $schedule, $givenDate);
    }

    public function createGameSchedule($field, $price, $limit, $date)
    {
        $gameSchedule = new GameSchedule();
        $gameSchedule->field_id = $field->id;
        $gameSchedule->price = $price;
        $gameSchedule->limit = $limit;
        $gameSchedule->date = $date;

        $gameSchedule->save();
    }
}
