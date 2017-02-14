<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSymbolMftable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		  Schema::table('mutualfunds', function($table) {
		  $table->string('symbol')->nullable();
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
		Schema::table('mutualfunds', function($table) {
        $table->dropColumn('symbol');
    });
	}
}
