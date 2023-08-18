<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveOptionFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_option_flows', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date_time')->nullable();
            $table->string('symbol', 256)->nullable();//ticker
            $table->string('call_put', 256)->nullable();//put_call
            $table->string('strike', 256)->nullable(); //strike_price
            $table->string('o_price', 256)->nullable();// ask
            $table->string('expiration', 256)->nullable();//date_expiration
            $table->string('premium', 256)->nullable();//cost_basis
            $table->string('volume', 256)->nullable();//size
            $table->string('open_interest', 256)->nullable();//open_interest
            $table->string('sentiment', 256)->nullable();//sentiment
            $table->string('activity_type', 256)->nullable();//option_activity_type
            $table->string('stock_price', 256)->nullable();//underlying_price
            $table->string('stock_volumn', 256)->nullable();//from tradier
            $table->string('stock_avg', 256)->nullable();
            $table->string('delta_value', 256)->nullable();
            $table->string('call_put_till_expiry_date', 256)->nullable();
            $table->string('option_symbol', 256)->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('live_option_flows');
    }
}
