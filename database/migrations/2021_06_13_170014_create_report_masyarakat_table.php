<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportMasyarakatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_masyarakat', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->nullable();
            $table->string('judul', 40)->nullable();
            $table->string('foto')->nullable();
            $table->string('status', 20)->nullable();
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
        Schema::dropIfExists('report_masyarakat');
    }
}
