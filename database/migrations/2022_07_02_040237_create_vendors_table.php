<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->text('description');
            $table->text('office_address');
            $table->string('email',150);
            $table->string('phone',15);
            $table->string('operator_name',60);
            $table->string('operator_phone',15);
            $table->string('tin',18);
            $table->string('trade_number',20);
            $table->integer('status')->default(1)->comment('1 for active 2 for Inactive');
           
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
        Schema::dropIfExists('vendors');
    }
};
