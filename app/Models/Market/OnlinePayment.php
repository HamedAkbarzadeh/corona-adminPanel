<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlinePayment extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['amount', 'user_id' , 'getway' , 'transaction_id' , 'bank_first_response' , 'bank_second_response' , 'status'];

    public function payments()
    {
        return $this->morphMany(Payment::class , 'paymentable');
    }
}
