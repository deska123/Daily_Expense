<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('shopping_details')) {
          Schema::create('shopping_details', function (Blueprint $table) {
              $table->bigIncrements('id');
              $table->unsignedBigInteger('shoppingId');
              $table->unsignedBigInteger('shopsId');
              $table->unsignedBigInteger('goodsId');

              $table->foreign('shoppingId')
                    ->references('id')
                    ->on('shopping')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

              $table->foreign('shopsId')
                    ->references('id')
                    ->on('shops')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

              $table->foreign('goodsId')
                    ->references('id')
                    ->on('goods')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

              $table->integer('qty')->default(1);
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
        if(Schema::hasTable('shopping_details')) {
          Schema::dropIfExists('shopping_details');
        }
    }
}
