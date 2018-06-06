<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositiveDayDiffsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "CREATE VIEW `positive_date_difference` AS SELECT id, (date_received_by_the_care_giver - date_sample_collected) as collected_to_received, (date_art_initiated - date_sample_collected) as collected_to_initiated, (date_vl_sample_collected - date_art_initiated) as initiation_to_vl_collection, (date_vl_result_received - date_art_initiated) as initiation_to_vl_received FROM survey_eid_responses WHERE result = 2;";

        \DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("DROP VIEW `positive_date_difference`");
    }
}
