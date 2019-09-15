<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYearMonthDateColumnsToExpenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('expense')) {
          if (!Schema::hasColumn('expense', 'year') && !Schema::hasColumn('expense', 'month') && !Schema::hasColumn('expense', 'date')) {
            Schema::table('expense', function (Blueprint $table) {
                $table->char('year', 4)->nullable();
                $table->char('month', 2)->nullable();
                $table->char('date', 2)->nullable();
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
          if (Schema::hasColumn('expense', 'year') && Schema::hasColumn('expense', 'month') && Schema::hasColumn('expense', 'date')) {
            Schema::table('expense', function (Blueprint $table) {
                $table->dropColumn(['year', 'month', 'date']);
            });
          }
        }
    }
}
