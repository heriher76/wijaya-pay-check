<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nrp', 11)->nullable();
            $table->string('nama', 20)->nullable();
            $table->string('pangkat', 20)->nullable();
            $table->string('jabatan', 20)->nullable();
            $table->string('email', 30)->unique()->nullable();
            $table->string('password', 255)->nullable();
            $table->string('image')->nullable();
            $table->char('no_hp', 13)->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('long', 10, 7)->nullable();
            $table->boolean('is_admin')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
