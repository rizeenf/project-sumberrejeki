<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_visits', function (Blueprint $table) {
            // PRIMARY KEY
            $table->id();

            // GENERAL FIELD
            $table->date('date');
            $table->integer('order');
            $table->time('timeIn');
            $table->time('timeOut')->nullable();
            $table->text('LA')->nullable();
            $table->text('LO')->nullable();
            $table->boolean('gift')->default(0);
            $table->text('product_id')->nullable();
            $table->integer('qty_sample')->default(0);
            
            // CUST VISIT FIELD
            $table->boolean('banner')->default(0);
            $table->enum('activity', ['visit', 'maintenance'])->nullable();
            $table->text('notes')->nullable();

            // OUTLET VISIT FIELD
            // $table->boolean('register')->default(0);
            $table->enum('register', ['Y', 'M', 'N'])->default('N');
            $table->integer('qtysell')->default(0);

            // INDEX KEY
            // $table->foreignId('customer_id')->references('id')->on('m_customers')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('staff_id')->references('id')->on('m_staff')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('customer_id')->nullable();
            $table->integer('staff_id')->nullable();
            // $table->integer('product_id')->nullable();

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
        Schema::dropIfExists('t_visits');
    }
}
