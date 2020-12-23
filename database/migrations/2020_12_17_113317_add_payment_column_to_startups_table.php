<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentColumnToStartupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('startups', function (Blueprint $table) {
            $table->integer('tariff_id')->default(0);
            $table->integer('paid')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('startups', function (Blueprint $table) {
            $table->dropColumn('tariff_id');
            $table->dropColumn('paid');
        });
    }
}
