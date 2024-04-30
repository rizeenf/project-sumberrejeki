<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtOutletVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dt_outlet_visits', function (Blueprint $table) {
            // $table->foreignId('visit_id')->references('id')->on('t_visits')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('product_id')->references('id')->on('m_products')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('visit_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            // $table->text('product_id')->nullable();
            $table->double('price_buy')->nullable();
            $table->text('reason')->nullable();

            // INDEX KEY
            // $table->foreignId('store_id')->references('id')->on('m_customers')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('store_id')->nullable();
            $table->string('pasar')->nullable();
            $table->text('patokan')->nullable();

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
        Schema::dropIfExists('dt_outlet_visits');
    }
}
