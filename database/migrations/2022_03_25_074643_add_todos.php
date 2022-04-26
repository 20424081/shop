<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddTodos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('todos', function (Blueprint $table) {
            DB::statement('ALTER TABLE todos ADD FULLTEXT `search` (`task`)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('todos', function (Blueprint $table) {
            DB::statement('ALTER TABLE todos DROP INDEX search');
        });
    }
}
