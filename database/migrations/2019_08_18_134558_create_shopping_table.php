<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('shopping')) {
          Schema::create('shopping', function (Blueprint $table) {
              $table->bigIncrements('id');
              $table->timestamps();
              $table->bigInteger('created_by')->nullable();
              $table->bigInteger('updated_by')->nullable();
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
        if(Schema::hasTable('shopping')) {
          Schema::dropIfExists('shopping');
        }
    }
}
