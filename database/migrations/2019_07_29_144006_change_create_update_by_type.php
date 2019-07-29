<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCreateUpdateByType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('vehicle_type', function (Blueprint $table) {
        $table->bigInteger('created_by')->change();
        $table->bigInteger('updated_by')->change();
      });

      Schema::table('transportation', function (Blueprint $table) {
        $table->bigInteger('created_by')->change();
        $table->bigInteger('updated_by')->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('vehicle_type', function (Blueprint $table) {
        $table->text()->change();
        $table->text()->change();
      });

      Schema::table('transportation', function (Blueprint $table) {
        $table->text()->change();
        $table->text()->change();
      });
    }
}
