<?php

use App\Enums\StudentStatusE;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Student extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('birthday');
            $table->text('description');
            $table->smallInteger('status')->default(0)->comment('StudentStatusE');
            $table->foreignId('courses_id')->constrained('courses')->onUpdate('cascade')->onDelete('cascade');
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
        //
        Schema::drop('student');
    }
}
