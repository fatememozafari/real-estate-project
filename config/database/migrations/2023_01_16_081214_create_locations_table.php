<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('real_estate_id')->unsigned();
            $table->foreign('real_estate_id')->references('id')->on('real_estates')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->string('description')->nullable();
            $table->date('construction_year')->nullable();

            $table->enum('type',['house','shop','land','garden','villa']);
            $table->enum('house_type',['house','apartment'])->nullable();
            $table->enum('contract',['for_sale','for_rent']);
            $table->string('address');
            $table->decimal('longitude')->nullable();
            $table->decimal('latitude')->nullable();
            $table->enum('cabinet_material',['metal','mdf','memberan','highglass'])->nullable();
            $table->enum('floor_material',['rock','parquet','ceramic','carpet','cement'])->nullable();

            $table->integer('floor_number')->default(1);
            $table->enum('has_parking',['yes','no'])->default('no');
            $table->enum('has_elevator',['yes','no'])->default('no');
            $table->integer('room_count')->nullable();

            $table->integer('total_metrage')->nullable();
            $table->integer('infrastructure_metrage')->nullable();
            $table->enum('has_yard',['yes','no'])->default('no');
            $table->integer('yard_metrage')->nullable();

            $table->enum('direction_type',['north','south'])->nullable();

            $table->bigInteger('purchase_price')->nullable();
            $table->bigInteger('mortgage')->nullable();
            $table->bigInteger('rent')->nullable();
            $table->enum('status',['active','in-active'])->default('active');
            $table->enum('deleted', ['deleted', 'un-deleted'])->default('un-deleted');
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
        Schema::dropIfExists('locations');
    }
}
