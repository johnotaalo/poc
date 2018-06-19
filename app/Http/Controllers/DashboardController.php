<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SurveyEIDResponse;
use App\SurveyVLResponse;
use App\PositiveDateDifference;
use App\NegativeDateDifference;
class DashboardController extends Controller
{
    function index(){
    	$data['patients'] = SurveyEIDResponse::count();
    	$data['positive_tats'] = ($this->getPositivesTAT());
    	$data['negative_tats'] = ($this->getNegativeTAT());
        $data['ppw_count'] = SurveyVLResponse::count();
        $data['suppressed'] = SurveyVLResponse::where('suppression', 1)->count();
        $data['not_suppressed'] = SurveyVLResponse::where('suppression', 2)->count();
        $data['invalid_suppression'] = SurveyVLResponse::where('suppression', 3)->count();
        $data['initiated_to_sample_collected'] = ($this->getVLTAT());
    	return view('dashboard.index')->with($data);
    }

    function getPositivesTAT(){
    	$differences = PositiveDateDifference::all();

    	$collected_to_received_median = collect($differences)->median('collected_to_received');
    	$collected_to_initiated_median = collect($differences)->median('collected_to_initiated');
    	$initiation_to_vl_collection_median = collect($differences)->median('initiation_to_vl_collection');
    	$initiation_to_vl_received_median = collect($differences)->median('initiation_to_vl_received');

    	return [
    		"Collection to Received"		=>	$collected_to_received_median,
    		"Collection to Initiated"		=>	$collected_to_initiated_median,
    		"Initiation to VL Collected"	=>	$initiation_to_vl_collection_median,
    		"Initiation to VL Received"		=>	$initiation_to_vl_received_median
    	];
    }

    function getNegativeTAT(){
    	$differences = NegativeDateDifference::all();

    	$collected_to_received_median = collect($differences)->median('collected_to_received');
    	$first_to_second_median = collect($differences)->median('first_to_second');

    	return [
    		"Collection to Received"								=>	$collected_to_received_median,
    		"Collection Test 1 to Collection Test 2"				=>	$first_to_second_median
    	];
    }

    function getVLTAT(){
        $differences = SurveyVLResponse::all();
        $differences_array = [];

        foreach ($differences as $difference) {
            $differences_array[]['initiated_to_sample_collected'] = $difference->getDateDifferenceInitiatedSampleCollected();
        }

        return collect($differences_array)->median('initiated_to_sample_collected');
    }
}
