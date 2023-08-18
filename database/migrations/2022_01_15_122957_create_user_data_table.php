<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('username', 256)->nullable();
            $table->string('email', 256)->nullable();
            $table->string('phone_number')->nullable();
            $table->date('date_registered')->nullable();
            $table->date('expiry_date')->nullable();
            $table->text('firebase_tokens')->nullable();
            $table->string('user_password', 256)->nullable();
            $table->string('logged_in', 256)->nullable();
            $table->string('active', 256)->nullable();
            $table->string('app_version_ios', 256)->nullable();
            $table->string('app_version_android', 256)->nullable();
            $table->string('device', 256)->nullable();
            $table->string('ip_address', 256)->nullable();
            $table->text('profile_image_url', 256)->nullable();
            $table->string('hash', 500)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_data');
    }
}
