<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyEIDResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_eid_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('county');
            $table->string('hei_number');
            $table->date('date_of_birth')->nullable();
            $table->string('gender');
            $table->string('entry_point');
            $table->string('other_entry_point')->nullable();
            $table->date('date_sample_collected')->nullable();
            $table->date('date_sample_received_at_lab')->nullable();
            $table->date('date_eid_test_done')->nullable();
            $table->date('date_released_by_the_testing_lab')->nullable();
            $table->date('date_received_by_the_care_giver')->nullable();
            $table->string('result')->nullable();
            $table->string('confirmatory_pcr')->nullable();
            $table->date('date_confirmatoy_pcr_sample_collected')->nullable();
            $table->date('date_result_received_by_caregiver')->nullable();
            $table->string('confirmatory_pcr_result')->nullable();
            $table->string('art_initiated')->nullable();
            $table->date('date_art_initiated')->nullable();
            $table->date('date_initiated_on_treatment')->nullable();
            $table->date('most_recent_appointment')->nullable();
            $table->date('most_recent_date_attended')->nullable();
            $table->date('previous_appointment')->nullable();
            $table->date('previous_appointment_attended')->nullable();
            $table->date('previous_appointment_1')->nullable();
            $table->date('previous_appointment_1_attended')->nullable();
            $table->date('date_vl_sample_collected')->nullable();
            $table->date('date_vl_sample_received_at_lab')->nullable();
            $table->date('date_vl_test_done_at_lab')->nullable();
            $table->date('date_vl_result_released')->nullable();
            $table->date('date_vl_result_received')->nullable();
            $table->string('vl_suppression')->nullable();
            $table->date('date_repeat_vl_collected')->nullable();
            $table->date('date_repeat_vl_received')->nullable();
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
        Schema::dropIfExists('survey_eid_responses');
    }
}
