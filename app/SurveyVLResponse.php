<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyVLResponse extends Model
{
    protected $table = "survey_vl_responses";
    protected $fillable = ["county", "ccc", "date_of_birth", "gender", "date_initiated", "vl_justification", "date_sample_collected", "date_sample_received_at_lab", "date_vl_test_done", "date_result_released", "date_result_received_by_care_giver", "suppression", "repeat_vl", "date_repeat_vl_collected", "date_vl_result_received_by_care_giver", "repeat_vl_result"];
}
