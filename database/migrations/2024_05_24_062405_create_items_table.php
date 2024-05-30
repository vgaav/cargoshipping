<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('item_client');
            $table->float('item_weight');
            $table->string('item_from');
            $table->string('item_destination');
            $table->timestamp('item_pickup_time');
            $table->timestamp('item_dropoff_time')->nullable();
            $table->float('item_quote');
            $table->string('item_image');
            $table->float('item_length')->nullable();
            $table->float('item_width')->nullable();
            $table->float('item_height')->nullable();
            $table->string('item_status')->nullable();
            $table->integer('item_current_bids')->nullable();
            $table->boolean('is_bid_placed')->default(false);  // Add this line
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
