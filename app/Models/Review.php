<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';

    public function scopeLatestOrder($query)
    {
        return $query->OrderBy('updated_at', 'DESC');
    }

    public function scopeMatchId($query, $id)
    {
        return $query->where('id', $id);
    }
}
