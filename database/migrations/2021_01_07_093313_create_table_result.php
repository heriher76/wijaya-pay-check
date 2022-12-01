<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableResult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('emergency_report_id')->nullable();
            $table->String('gn', 100)->nullable();
            $table->String('hn', 100)->nullable();
            $table->String('fn', 100)->nullable();
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
        Schema::dropIfExists('table_result');
    }
}