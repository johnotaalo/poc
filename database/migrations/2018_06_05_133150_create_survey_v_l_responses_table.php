<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyVLResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_vl_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('county');
            $table->string('ccc');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->date('date_initiated')->nullable();
            $table->string('vl_justification')->nullable();
            $table->date('date_sample_collected')->nullable();
            $table->date('date_sample_received_at_lab')->nullable();
            $table->date('date_vl_test_done')->nullable();
            $table->date('date_result_released')->nullable();
            $table->date('date_result_received_by_care_giver')->nullable();
            $table->string('suppression')->nullable();
            $table->string('repeat_vl')->nullable();
            $table->date('date_repeat_vl_collected')->nullable();
            $table->date('date_vl_result_received_by_care_giver')->nullable();
            $table->string('repeat_vl_result')->nullable();
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
        Schema::dropIfExists('survey_vl_responses');
    }
}
