<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;

    public function transaction() {
        return $this->hasMany(Transaction::class,'id','transaction_id');
    }
}
