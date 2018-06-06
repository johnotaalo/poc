<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNegativeDayDiffsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "CREATE VIEW `negative_date_difference` AS SELECT 
                    id,
                    (date_received_by_the_care_giver - date_sample_collected) as collected_to_received,
                    (date_repeat_vl_received - date_repeat_vl_collected) as first_to_second
                FROM survey_eid_responses
                WHERE result = 1;";

        \DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("DROP TABLE `negative_date_difference`");
    }
}
