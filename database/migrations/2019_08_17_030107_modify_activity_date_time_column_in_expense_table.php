<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyActivityDateTimeColumnInExpenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('expense')) {
        if (Schema::hasColumn('expense', 'activityDateTime')) {
          Schema::table('expense', function (Blueprint $table) {
              $table->dropColumn('activityDateTime');
          });
          Schema::table('expense', function (Blueprint $table) {
              $table->date('activityDate');
              $table->time('activityTime');
          });
        }
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      if (Schema::hasTable('expense')) {
        if (Schema::hasColumn('expense', 'activityDate') && Schema::hasColumn('expense', 'activityTime')) {
          Schema::table('expense', function (Blueprint $table) {
              $table->dropColumn('activityDate');
              $table->dropColumn('activityTime');
          });
          Schema::table('expense', function (Blueprint $table) {
              $table->dateTime('activityDateTime');
          });
        }
      }
    }
}
