<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_title',
        'company',
        'invoice_number',
        'date',

        'seller_company',
        'seller_address',
        'seller_email',
        'seller_country',
        'seller_contact',
        'seller_other',

        'buyer_name',
        'buyer_company',
        'buyer_address',
        'buyer_email',
        'buyer_contact',

        'product_description',
        'product_quantity',
        'product_price',
        'product_sub_total',
        'product_tva',
        'product_total',

        'condition_payment_mode',
        'condition_pay_until_date',
    ];

}
