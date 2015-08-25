<?php

namespace AnvarCO\PayuLatam\Confirmation;

use Illuminate\Database\Eloquent\Model;

class PayUConfirmation extends Model{

    protected $table = "payu_confirmations";

    protected $fillable = [
        'reference_sale',
        'state_pol',
        'response_code_pol',
        'reference_pol',
        'sign',
        'payment_method',
        'value',
        'tax',
        'transaction_date'
    ];

}