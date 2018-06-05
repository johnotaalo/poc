<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyEIDResponse extends Model
{
	protected $table = "survey_eid_responses";

    protected $fillable = [
    	"county",
    	"hei_number",
    	"date_of_birth",
    	"gender",
    	"entry_point",
    	'other_entry_point',
        'date_sample_collected',
        'date_sample_received_at_lab',
        'date_eid_test_done',
        'date_released_by_the_testing_lab',
        'date_received_by_the_care_giver',
        'result',
        'confirmatory_pcr',
        'date_confirmatoy_pcr_sample_collected',
        'date_result_received_by_caregiver',
        'confirmatory_pcr_result',
        'art_initiated',
        'date_art_initiated',
        'date_initiated_on_treatment',
        'most_recent_appointment',
        'most_recent_date_attended',
        'previous_appointment',
        'previous_appointment_attended',
        'previous_appointment_1',
        'previous_appointment_1_attended',
        'date_vl_sample_collected',
        'date_vl_sample_received_at_lab',
        'date_vl_test_done_at_lab',
        'date_vl_result_released',
        'date_vl_result_received',
        'vl_suppression',
        'date_repeat_vl_collected',
        'date_repeat_vl_received',
        'repeat_vl_result'
    ];
}
