<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bound extends Model
{
    use HasFactory;

    protected $primaryKey = "bound_id";

    protected $fillable = [
        'interests_place_id',
        'latitude',
        'longitude',
        'detour_forward',
        'detour_left',
        'detour_back',
        'detour_right'
    ];
}
