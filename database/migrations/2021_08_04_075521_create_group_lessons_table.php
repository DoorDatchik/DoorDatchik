<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_lessons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lesson_id')->nullable()->unsigned();
            $table->bigInteger('group_id')->nullable()->unsigned();
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('set null')->onUpdate('set null');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null')->onUpdate('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_lessons');
    }
}
