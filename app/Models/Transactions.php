<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function transactions()
    {
        return $this->belongsTo(Cars::class, 'cars_id', 'id');
    }
}
