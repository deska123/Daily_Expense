<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLevelAndIsapprovedColumnsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('users')) {
        if (!Schema::hasColumn('users', 'level') && !Schema::hasColumn('users', 'is_approved')) {
          Schema::table('users', function (Blueprint $table) {
              $table->enum('level', ['admin', 'common_user'])->default('common_user');
              $table->boolean('is_approved')->default(false);
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
      if (Schema::hasTable('users')) {
        if (Schema::hasColumn('users', 'level') && Schema::hasColumn('users', 'is_approved')) {
          Schema::table('users', function (Blueprint $table) {
              $table->dropColumn(['level', 'is_approved']);
          });
        }
      }
    }
}
