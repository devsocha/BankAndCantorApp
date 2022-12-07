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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->integer('users_demo_id');
            $table->string('type');
            $table->string('inorout');
            $table->string('transfrom')->nullable();
            $table->string('transto')->nullable();
            $table->integer('sendTo')->nullable();
            $table->integer('sendFrom')->nullable();
            $table->double('money')->nullable();
            $table->double('moneyTransfered')->nullable();
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
        Schema::dropIfExists('activities');
    }
};
