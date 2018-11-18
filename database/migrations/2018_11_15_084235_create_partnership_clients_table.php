<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnershipClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partnership_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('partnership_id');
            $table->integer('name');
            $table->integer('address');
            $table->integer('phone');
            $table->enum('status',['new', 'processed', 'confirmed']);
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
        Schema::dropIfExists('partnership_clients');
    }
}
