<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransportation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('transportation')) {
          Schema::create('transportation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('vehicleTypeId');
            $table->foreign('vehicleTypeId')
                  ->references('id')
                  ->on('vehicle_type')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('origin', 150);
            $table->string('destination', 150);
            $table->string('code', 100)->nullable();
            $table->string('fleet', 180);
            $table->string('receipt', 255)->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();
            $table->text('created_by')->nullable();
            $table->text('updated_by')->nullable();
          });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('transportation')) {
          Schema::dropIfExists('transportation');
        }
    }
}
