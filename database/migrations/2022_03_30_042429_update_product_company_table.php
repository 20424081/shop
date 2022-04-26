<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateProductCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_companies', function (Blueprint $table) {
            //
            DB::statement('ALTER TABLE product_companies ADD FULLTEXT `search` (`product_company_name`)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_companies', function (Blueprint $table) {
            //
            DB::statement('ALTER TABLE product_companies DROP INDEX search');
        });
    }
}
