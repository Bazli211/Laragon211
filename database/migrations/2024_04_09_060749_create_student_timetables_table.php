<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_timetables', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('student_id')->nullable();
            $table->unsignedinteger('day_id')->nullable();
            $table->unsignedinteger('subject_id')->nullable();
            $table->unsignedinteger('hall_id')->nullable(); 
            $table->string('time_from')->nullable();
            $table->string('time_to')->nullable();
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
        Schema::dropIfExists('student_timetables');
    }
}
