<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSubBrandProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_sub_brand_products', function (Blueprint $table) {
            // PRIMARY KEY
            $table->id();

            // CUSTOM FIELD
            $table->string('name')->unique();

            // INDEX KEY
            $table->integer('category_id')->nullable();
            $table->integer('brand_id')->nullable();

            // CHECKER DATA IS MUST
            $table->boolean('status')->default(1);
            $table->boolean('disabled')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_sub_brand_products');
    }
}
