<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SurveyEIDResponse;
use App\SurveyVLResponse;

class ImportController extends Controller
{
    function surveyData(){
    	$eid_data = \Excel::selectSheetsByIndex(1)->load(\Storage::url('/app/data/surveydata.xlsx'))->get();
    	$eid_data_headers = $eid_data->getHeading();

    	$vl_data = \Excel::selectSheetsByIndex(2)->load(\Storage::url('/app/data/surveydata.xlsx'))->get();
    	$vl_data_headers = $vl_data->getHeading();

    	// echo "<pre>";print_r($eid_data_headers);

    	foreach ($eid_data as $data) {
    		$eidResponse = [
    			'county'								=>	'Meru',
    			"hei_number"							=>	$data[$eid_data_headers[0]],
		    	"date_of_birth"							=>	$data[$eid_data_headers[1]],
		    	"gender"								=>	$data[$eid_data_headers[2]],
		    	"entry_point"							=>	$data[$eid_data_headers[3]],
		    	'other_entry_point'						=>	$data[$eid_data_headers[4]],
		        'date_sample_collected'					=>	$data[$eid_data_headers[5]],
		        'date_sample_received_at_lab'			=>	$data[$eid_data_headers[6]],
		        'date_eid_test_done'					=>	$data[$eid_data_headers[7]],
		        'date_released_by_the_testing_lab'		=>	$data[$eid_data_headers[8]],
		        'date_received_by_the_care_giver'		=>	$data[$eid_data_headers[9]],
		        'result'								=>	$data[$eid_data_headers[10]],
		        'confirmatory_pcr'						=>	$data[$eid_data_headers[11]],
		        'date_confirmatoy_pcr_sample_collected'	=>	$data[$eid_data_headers[12]],
		        'date_result_received_by_caregiver'		=>	$data[$eid_data_headers[13]],
		        'confirmatory_pcr_result'				=>	$data[$eid_data_headers[14]],
		        'art_initiated'							=>	$data[$eid_data_headers[15]],
		        'date_art_initiated'					=>	$data[$eid_data_headers[16]],
		        'most_recent_appointment'				=>	$data[$eid_data_headers[17]],
		        'most_recent_date_attended'				=>	$data[$eid_data_headers[18]],
		        'previous_appointment'					=>	$data[$eid_data_headers[19]],
		        'previous_appointment_attended'			=>	$data[$eid_data_headers[20]],
		        'previous_appointment_1'				=>	$data[$eid_data_headers[21]],
		        'previous_appointment_1_attended'		=>	$data[$eid_data_headers[22]],
		        'date_vl_sample_collected'				=>	$data[$eid_data_headers[23]],
		        'date_vl_sample_received_at_lab'		=>	$data[$eid_data_headers[24]],
		        'date_vl_test_done_at_lab'				=>	$data[$eid_data_headers[25]],
		        'date_vl_result_released'				=>	$data[$eid_data_headers[26]],
		        'date_vl_result_received'				=>	$data[$eid_data_headers[27]],
		        'vl_suppression'						=>	$data[$eid_data_headers[28]],
		        'date_repeat_vl_collected'				=>	$data[$eid_data_headers[29]],
		        'date_repeat_vl_received'				=>	$data[$eid_data_headers[30]],
		        'repeat_vl_result'						=>	$data[$eid_data_headers[31]]
    		];

    		SurveyEIDResponse::create($eidResponse);
    	}

    	foreach ($vl_data as $data) {
    		# code...
    	}
    }
}
