<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partnerships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->string('price');
            $table->string('discount')->nullable();
            $table->date('discount_start')->nullable();
            $table->date('discount_end')->nullable();
            $table->text('promo_products')->nullable();
            $table->text('promo_facilities')->nullable();
            $table->text('shipping_costs')->nullable();
            $table->text('protection_area')->nullable();
            $table->text('partnership_status')->nullable();
            $table->text('repeat_order')->nullable();
            $table->text('sales_target')->nullable();
            $table->tinyInteger('active');
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
        Schema::dropIfExists('partnerships');
    }
}
