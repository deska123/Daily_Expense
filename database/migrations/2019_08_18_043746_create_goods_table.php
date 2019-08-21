<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(!Schema::hasTable('goods')) {
        Schema::create('goods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 250);
            $table->integer('price')->default(0);
            $table->text('remark')->nullable();
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
      if(Schema::hasTable('goods')) {
        Schema::dropIfExists('goods');
      }
    }
}
