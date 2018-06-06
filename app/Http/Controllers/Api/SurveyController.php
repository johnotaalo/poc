<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SurveyEIDResponse;
use App\SurveyVLResponse;

class SurveyController extends Controller
{
    function getEIDOutcomes(){
    	$count = SurveyEIDResponse::select(\DB::raw('(IF (result = 1, "Negative", "Positive")) AS result'), \DB::raw('count(*) as total'))
    		->where('result', '!=', NULL)
    		->groupBy('result')->get();;

    	return $count;
    }

    function getPositiveOutcomesDetails(){
    	$sql = "SELECT
			count(*) as total,
			(SELECT count(*) as confimarory_pcr FROM survey_eid_responses WHERE confirmatory_pcr = 'yes') as confirmatory_pcr,
			(SELECT count(*) FROM survey_eid_responses WHERE date_initiated_on_treatment IS NOT NULL) as initiated
		FROM survey_eid_responses
		WHERE result = 2
		GROUP BY result;";

		$results = \DB::select($sql)[0];

		// echo "<pre>";print_r($results);die;

		$response = [];

		$response[] = [
			'title'	=>	'Positives',
			'total'	=>	$results->total
		];

		$response[] = [
			'title'	=>	'confirmatory_pcr',
			'total'	=>	$results->confirmatory_pcr
		];

		$response[] = [
			'title'	=>	'initiated',
			'total'	=>	$results->initiated
		];

		return $response;
    }

function getNegativeOutcomesDetails(){
    	$sql = "SELECT
					count(*) as total,
					(SELECT count(*) FROM survey_eid_responses WHERE date_repeat_vl_received IS NOT NULL) as repeat_vl
					FROM survey_eid_responses
				WHERE result = 1
				GROUP BY result;";

		$results = \DB::select($sql)[0];

		// echo "<pre>";print_r($results);die;

		$response = [];

		$response[] = [
			'title'	=>	'Negatives',
			'total'	=>	$results->total
		];

		$response[] = [
			'title'	=>	'repeat_vl',
			'total'	=>	$results->repeat_vl
		];

		return $response;
    }
}
