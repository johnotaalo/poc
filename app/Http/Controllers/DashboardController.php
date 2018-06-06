<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SurveyEIDResponse;
use App\PositiveDateDifference;
use App\NegativeDateDifference;
class DashboardController extends Controller
{
    function index(){
    	$data['patients'] = SurveyEIDResponse::count();
    	$data['positive_tats'] = ($this->getPositivesTAT());
    	$data['negative_tats'] = ($this->getNegativeTAT());
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
}
