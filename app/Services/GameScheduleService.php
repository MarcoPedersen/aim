<?php

namespace App\Services;

use App\Models\Field;
use App\Models\GameSchedule;

class GameScheduleService
{
    public function generateGameSchedule($fieldId, $numberOfSchedules = 1)
    {
        $field = Field::find($fieldId);
        if (!$field) {
            return 'Field not found';
        }
        for ($x = 0; $x <= $numberOfSchedules; $x++) {
            $this->createGameSchedule($field);
        }
        return $field->name;
    }

    public function createGameSchedule($field)
    {
        $gameSchedule = new GameSchedule();

        $gameSchedule->field_id = $field->id;
        $gameSchedule->price = '100';
        $gameSchedule->limit = '50';
        $gameSchedule->date = '2021-05-21 00:00:00';

        $gameSchedule->save();
    }
}
