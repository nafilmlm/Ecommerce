<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::defaultStringLength(191);
        Schema::create('shipping_masters', function (Blueprint $table) {
            $table->id();
            $table->string('countryName');
            $table->string('shippingType');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('estimatedDelivery');
            $table->decimal('cost');
            $table->string('tracking');
            $table->text('carrier');
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
        Schema::dropIfExists('shipping_masters');
    }
}
