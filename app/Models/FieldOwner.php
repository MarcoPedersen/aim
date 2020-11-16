<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldOwner extends Model
{
    use HasFactory;

    protected $fillable = ['owner','field'];

    public function field()
    {
        return $this->belongsTo('App\Models\Field');;
    }
}
