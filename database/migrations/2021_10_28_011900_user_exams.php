<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserExams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_exams', function (Blueprint $table) {
            $table->increments('exam_id');
            $table->unsignedInteger('user_id')->default('0');
            $table->unsignedSmallInteger('total_marks')->default('0');
            $table->unsignedSmallInteger('pass_marks')->default('0');
            $table->unsignedSmallInteger('total_question');
            $table->unsignedSmallInteger('time_taken')->default('0')->comment('user take time to give exam');
            $table->unsignedTinyInteger('each_question_mark')->default('1');
            $table->unsignedTinyInteger('total_right_ans')->default('0');
            $table->unsignedTinyInteger('total_wrong_ans')->default('0');
            $table->unsignedTinyInteger('total_not_attempt')->default('0');
            $table->smallInteger('total_marks_obtain')->default(0);
            $table->unsignedTinyInteger('is_active')->default('1');
            $table->unsignedTinyInteger('is_deleted')->default('0');
            $table->timestamps();
            $table->longText('user_ans')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_exams');
    }
}
