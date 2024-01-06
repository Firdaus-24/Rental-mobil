<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Cars extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function transactions()
    {
        return $this->hasMany(Transactions::class, 'cars_id', 'id');
    }
}
