<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table
                ->foreignId('comment_id')
                ->constrained()
                ->onDelete('cascade');
            $table->boolean('liked'); // если 1 то liked, если 0 то disliked
            $table->timestamps();

            $table->unique(['user_id', 'comment_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
