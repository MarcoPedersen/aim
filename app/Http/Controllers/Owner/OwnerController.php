<?php

namespace App\Http\Controllers\Owner;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::user()->id;
        $fields = User::findOrFail($userId)->fields;

        return view('owner.dashboard', [
            'fields' => $fields,
        ]);
    }
}
