<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function welcome()
    {
        $fieldLocations = Field::select('latitude as lat','longitude as lng')->whereNotNull('latitude')->whereNotNull('longitude')->get()->toArray();

        return view('welcome', [
            'fieldLocations' => json_encode($fieldLocations)
        ]);
    }
}
