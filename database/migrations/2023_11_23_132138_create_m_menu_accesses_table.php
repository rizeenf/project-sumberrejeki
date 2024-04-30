<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMMenuAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_menu_accesses', function (Blueprint $table) {
            // PRIMARY KEY
            $table->id();

            // CUSTOM FIELD
            $table->boolean('view')->default(0);
            $table->boolean('detail')->default(0);
            $table->boolean('add')->default(0);
            $table->boolean('edit')->default(0);
            $table->boolean('delete')->default(0);
            $table->boolean('export')->default(0);
            $table->boolean('import')->default(0);
            $table->boolean('approval')->default(0);

            // INDEX KEY
            $table->integer('group_menu_id')->nullable();
            $table->integer('main_menu_id')->nullable();
            $table->integer('menu_id')->nullable();
            $table->integer('sub_menu_id')->nullable();

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
        Schema::dropIfExists('m_menu_accesses');
    }
}
