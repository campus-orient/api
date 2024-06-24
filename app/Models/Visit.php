<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $primaryKey = "visit_id";
    protected $guarded = [];

    public function interestsPlace()
    {
        return $this->belongsTo(InterestsPlace::class, 'interests_place_id', 'interests_place_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
