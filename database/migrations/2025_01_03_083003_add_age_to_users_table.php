<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgeToUsersTable extends Migration
{
  public function up()
  {
    Schema::table('users', function (Blueprint $table) {
      if (!Schema::hasColumn('users', 'age')) {
        $table->integer('age')->nullable()->after('status');
      }
    });
  }

  public function down()
  {
    Schema::table('users', function (Blueprint $table) {
      if (Schema::hasColumn('users', 'age')) {
        $table->dropColumn('age');
      }
    });
  }
}
