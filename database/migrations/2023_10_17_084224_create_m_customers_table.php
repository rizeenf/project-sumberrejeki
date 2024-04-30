<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_customers', function (Blueprint $table) {
            // PRIMARY KEY
            $table->id();
            
            // CUSTOM FIELD
            $table->string('code')->unique();
            $table->string('name', 100);
            // $table->string('owner', 100)->nullable();
            $table->text('phone')->nullable();
            $table->binary('photo')->nullable();
            $table->text('address')->nullable();
            $table->text('LA')->nullable();
            $table->text('LO')->nullable();
            $table->string('area', 100)->nullable();
            $table->string('subarea', 100)->nullable();
            $table->boolean('regist')->default(0);
            $table->boolean('type')->default(0); //0 = CUST, 1 = OUTLET
            $table->binary('banner')->nullable();

            // INDEX KEY
            // $table->integer('branch_id')->nullable();
            // $table->foreignId('branch_id')->references('id')->on('m_branches')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('branch_id')->nullable();
            $table->unsignedInteger('staff_id')->nullable();

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
        Schema::dropIfExists('m_customers');
    }
}
