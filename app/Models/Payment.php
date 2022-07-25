<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function paymentmethod() {
        return $this->belongsTo(PaymentMethod::class,'payment_method_id');
    }

}
