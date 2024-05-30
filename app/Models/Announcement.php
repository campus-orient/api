<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $primaryKey = "announcement_id";

    protected $fillable = [
        'bound_id',
        'message'
    ];

    public function bound()
    {
        return $this->belongsTo(Bound::class, 'bound_id', 'bound_id');
    }
}
