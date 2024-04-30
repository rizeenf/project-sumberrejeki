<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMScheduleVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_schedule_visits', function (Blueprint $table) {
            // PRIMARY KEY
            $table->id();

            // CUSTOM FIELD
            $table->string('name')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('pattern', ['D', 'W', 'M', 'Y'])->default('D');
            $table->integer('value')->default(1);
            $table->integer('target')->default(0);

            // INDEX KEY
            $table->integer('staff_id')->nullable();

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
        Schema::dropIfExists('m_schedule_visits');
    }
}
