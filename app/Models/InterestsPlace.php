<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestsPlace extends Model
{
    use HasFactory;

    protected $primaryKey = "interests_place_id";

    protected $fillable = [
        'name', 'latitude', 'longitude'
    ];

    public function visits()
    {
        return $this->hasMany(Visit::class, 'interests_place_id');
    }

    public function bounds()
    {
        return $this->hasMany(Bound::class, 'interests_place_id');
    }
}
