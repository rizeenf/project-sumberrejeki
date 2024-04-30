<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_gifts', function (Blueprint $table) {
            $table->integer('visit_id')->nullable();
            $table->enum('type',['K', 'B', 'C', 'J'])->nullable(); //K = Kaos, B = Banner/Spanduk, C = Calendar, J = Jam
            $table->integer('qty')->default(1);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('t_gifts');
    }
}
