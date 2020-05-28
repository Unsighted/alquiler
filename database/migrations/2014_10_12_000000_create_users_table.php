<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('admin')->default(false);
            $table->rememberToken();
            $table->timestamps();

             // Stripe fields

             $table->string('stripe_id')->nullable(); // Key para identificar al cliente. 
             $table->string('card_brand')->nullable(); // Compania de la tarjeta que usa.
             $table->string('card_last_four')->nullable(); // los últimos cuatro digitos de la tarjeta.
             $table->timestamp('trial_ends_at')->nullable(); // Fecha de vencimiiento de la suscripción.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
