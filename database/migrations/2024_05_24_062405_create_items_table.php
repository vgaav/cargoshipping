<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id('item_id'); // Primary key
            $table->string('item_name'); // Name or description
            $table->string('item_client'); // Client name
            $table->decimal('item_weight', 8, 2); // Weight in kg
            $table->string('item_from'); // Origin
            $table->string('item_destination'); // Destination
            $table->string('item_pickup_time'); // Pickup time
            $table->string('item_dropoff_time'); // Drop-off time
            $table->decimal('item_quote', 10, 2); // Quote or pricing
            $table->string('item_image'); // Image URL or path
            $table->decimal('item_length', 8, 2)->nullable(); // Length
            $table->decimal('item_width', 8, 2)->nullable(); // Width
            $table->decimal('item_height', 8, 2)->nullable(); // Height
            $table->string('item_status')->nullable(); // Status
            $table->integer('item_current_bids')->nullable(); // Current bids
            $table->timestamps(); // Created and updated timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
