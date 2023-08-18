<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('er_datas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('symbol', 256)->nullable();
            $table->string('price', 100)->nullable();
            $table->date('er_date')->nullable();
            $table->integer('quarter')->nullable();
            $table->string('eps_act', 100)->nullable();
            $table->string('eps_est', 100)->nullable();
            $table->string('rev_act', 100)->nullable();
            $table->string('rev_est', 100)->nullable();
            $table->integer('er_view')->nullable();
            $table->string('price_before', 100)->nullable();
            $table->string('price_after', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('er_datas');
    }
}
