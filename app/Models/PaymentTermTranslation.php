<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTermTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_term_id',
        'locale',
        'name',
        'down_payment',
        'max_installments'
    ];
}
