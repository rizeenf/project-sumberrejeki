<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtCustVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dt_cust_visits', function (Blueprint $table) {
            // $table->foreignId('visit_id')->references('id')->on('t_visits')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('category_id')->references('id')->on('m_category_products')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('display_id')->references('id')->on('m_displays')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('visit_id')->nullable();
            // $table->unsignedInteger('category_id')->nullable();
            // $table->unsignedInteger('display_id')->nullable();
            $table->text('category_id')->nullable();
            $table->text('display_id')->nullable();
            $table->text('stok')->nullable();
            $table->text('reason')->nullable();

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
        Schema::dropIfExists('dt_cust_visits');
    }
}
