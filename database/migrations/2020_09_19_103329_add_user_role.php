<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class AddUserRole extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 16)->after('status');
        });

        DB::table('users')->update([
            'role' => 'user',
        ]);
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
           $table->dropColumn('role');
        });
    }
}
