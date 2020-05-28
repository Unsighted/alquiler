<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuscriptionsTable extends Migration
{
 
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id'); // id
            $table->integer('user_id'); // Usuario de la bd
            $table->string('name'); // nombre del plan de la suscripción
            $table->string('stripe_id'); // Asociado con stripe
            $table->string('stripe_plan');  // plan que eligió
            $table->integer('quantity'); // cantidad que se cobra por la suscripción
            $table->timestamp('trial_ends_at')->nullable(); // si la suscripción está en estado trial
            $table->timestamp('ends_at')->nullable(); // Fecha de cancelación de la suscripción
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
        Schema::dropIfExists('subscriptions');
    }
}
