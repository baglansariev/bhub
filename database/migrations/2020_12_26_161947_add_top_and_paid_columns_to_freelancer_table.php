<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTopAndPaidColumnsToFreelancerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('freelancer', function (Blueprint $table) {
            $table->integer('paid')->default(0);
            $table->integer('top')->default(0);
            $table->timestamp('top_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('freelancer', function (Blueprint $table) {
            $table->dropColumn('paid');
            $table->dropColumn('top');
            $table->dropColumn('top_date');
        });
    }
}
