<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            //invoice_infos
            $table->string('invoice_title');
            $table->string('company');
            $table->string('invoice_number');
            $table->string('date');

            //seller
            $table->string('seller_company');
            $table->string('seller_address');
            $table->string('seller_email');
            $table->string('seller_country')->default("France");
            $table->string('seller_contact');
            $table->string('seller_other')->nullable();



            //buyer
            $table->string('buyer_name')->nullable();
            $table->string('buyer_company');
            $table->string('buyer_address');
            $table->string('buyer_email');
            $table->string('buyer_contact');

            //product
            $table->string('product_description');
            $table->string('product_quantity');
            $table->string('product_price');
            $table->string('product_sub_total');
            $table->string('product_tva');
            $table->string('product_total');


            //condition
            $table->string('condition_payment_mode');
            $table->string('condition_pay_until_date');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
