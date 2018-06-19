<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SurveyVLResponse extends Model
{
    protected $table = "survey_vl_responses";
    protected $fillable = ["county", "ccc", "date_of_birth", "gender", "date_initiated", "vl_justification", "date_sample_collected", "date_sample_received_at_lab", "date_vl_test_done", "date_result_released", "date_result_received_by_care_giver", "suppression", "repeat_vl", "date_repeat_vl_collected", "date_vl_result_received_by_care_giver", "repeat_vl_result"];

    public function getDateDifferenceInitiatedSampleCollected(){
    	if($this->attributes['date_initiated'] != null && $this->attributes['date_sample_collected'] != null){
	    	$dateInitiated = Carbon::createFromFormat("Y-m-d", $this->attributes['date_initiated']);
	    	$dateSampleCollected = Carbon::createFromFormat("Y-m-d", $this->attributes['date_sample_collected']);
	    	return $dateSampleCollected->diffInDays($dateInitiated);
	    }

    	return 0;
    }
}
