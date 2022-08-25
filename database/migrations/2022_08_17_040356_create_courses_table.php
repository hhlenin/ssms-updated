<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacher_id');
            $table->string('name');
            $table->string('start_date');
            $table->string('start_timestamp');
            $table->string('end_date');
            $table->string('end_timestamp');
            $table->integer('fee');
            $table->text('short_description');
            $table->longText('long_description');
            $table->text('image')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->text('rejection_cause')->nullable()->comment('0/Unappreoved,1/Approved,2/Rejected');

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
        Schema::dropIfExists('courses');
    }
};
