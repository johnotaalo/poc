<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_stations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('county');
            $table->string('facility');
            $table->date('survey_date');
            $table->enum('facility_type', ['poc', 'non_poc']);
            $table->text('data_collectors');
            $table->string('survey_type');
            $table->string('leadership_structure');
            $table->text('leadership_structure_other')->nullable();
            $table->string('part_of_twg');
            $table->text('twg_details')->nullable();
            $table->string('twg_meeting_frequency')->nullable();
            $table->text('twg_other_meeting_frequency')->nullable();
            $table->text('hiv_implementing_partners')->nullable();
            $table->text('tb_implementing_partners')->nullable();
            $table->text('other_key_stakeholders')->nullable();
            $table->text('other_partners_other_disease_area')->nullable();
            $table->integer('laboratory_staff');
            $table->text('equipment_available')->nullable();
            $table->integer('phlebotomy_room_staff');
            $table->integer('tb_section_staff');
            $table->integer('microscopy_room_staff');
            $table->integer('immunology_section_staff');
            $table->integer('other_departments_staff');
            $table->integer('lab_staff_poc_training');
            $table->integer('number_of_lab_staff_trained')->nullable();
            $table->date('trained_officer_1');
            $table->date('trained_officer_2');
            $table->date('trained_officer_3');
            $table->date('trained_officer_4');
            $table->date('trained_officer_5');
            $table->date('trained_officer_6');
            $table->integer('lab_staff_tots_or_superusers');
            $table->text('lab_staff_details_with_costs')->nullable();
            $table->integer('site_enrolled_in_eqa_scheme');
            $table->text('schemes_enrolled_in')->nullable();
            $table->text('other_schemes_enrolled_in')->nullable();
            $table->integer('eqa_participation_paid_by');
            $table->text('eqa_participation_paid_by_other')->nullable();
            $table->text('major_challenges_in_laboratory');
            $table->text('other_challenges_in_laboratory')->nullable();
            $table->integer('storage_systems_used');
            $table->text('other_storage_systems_used')->nullable();
            $table->string('storage_space_status');
            $table->string('means_of_ordering_laboratory_equipment');
            $table->text('other_means')->nullable();
            $table->string('where_reagents_ordered_from');
            $table->text('other_where_reagents_ordered_from')->nullable();
            $table->string('reagents_delivery');
            $table->text('other_reagents_delivery')->nullable();
            $table->string('resupply_frequency');
            $table->text('consumption_report_tools')->nullable();
            $table->text('other_consumption_report_tools')->nullable();
            $table->text('report_transmission');
            $table->string('consumption_reporting_frequency');
            $table->string('offsite_results_accessed');
            $table->text('other_offsite_results_accessed')->nullable();
            $table->string('laboratory_lab_result_transfer_process');
            $table->string('laboratory_lab_result_transfer_process_other')->nullable();
            $table->text('result_access_by_referring_site');
            $table->text('result_access_by_referring_site_other')->nullable();
            $table->text('facilities_refer_sputum');
            $table->text('volume_and_frequency_per_month')->nullable();
            $table->text('samples_referred_by_facility');
            $table->text('where_facility_refers_samples');
            $table->string('frequency_of_referral');
            $table->string('sample_transportation_setup');
            $table->text('other_sample_transportation_setup')->nullable();
            $table->string('courier_service_used');
            $table->text('other_courier_service_used')->nullable();
            $table->string('sample_transportation_paid_by');
            $table->text('other_sample_transportation_paid_by')->nullable();
            $table->text('major_challenges_in_sample_transportation');
            $table->text('other_major_challenges_in_sample_transportation')->nullable();
            $table->string('waste_management_protocol')->nullable();
            $table->string('incinerator_on_site')->nullable();
            $table->string('incinerator_temperature')->nullable();
            $table->string('nearby_site');
            $table->text('name_of_site')->nullable();
            $table->string('waste_management_process');
            $table->text('collected_by')->nullable();
            $table->text('other_waste_management_process')->nullable();
            $table->string('ongoing_efforts_improving_waste_management');
            $table->text('specify_ongoing_efforts')->nullable();
            $table->string('level_of_staffing_nurses');
            $table->string('level_of_staffing_lab_staff');
            $table->string('level_of_staffing_cos');
            $table->string('level_of_staffing_mentor_mothers');
            $table->string('level_of_staffing_peer_educators');
            $table->string('level_of_staffing_pharmacists');
            $table->string('level_of_staffing_data_managers');
            $table->string('cme_frequency');
            $table->text('cme_conducted_by');
            $table->string('site_supervision_frequency');
            $table->string('site_supervision_conducted_by');
            $table->string('mentorship_frequency');
            $table->string('mentorship_conducted_by');
            $table->text('major_challenges_in_hr');
            $table->string('data_management_handling_procedure')->nullable();
            $table->string('electronic_medical_records_system');
            $table->string('electronic_medical_records_system_name')->nullable();
            $table->string('backup_for_electronic_system');
            $table->text('backup_used')->nullable();
            $table->text('why_no_backup_used')->nullable();
            $table->string('dedicated_data_clerk');
            $table->text('data_handled_by')->nullable();
            $table->string('service_data_reported');
            $table->string('where_service_data_reported');
            $table->string('internet_connection');
            $table->string('internet_paid_by');
            $table->timestamp('survey_start')->nullable();
            $table->timestamp('survey_end')->nullable();
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
        Schema::dropIfExists('survey_stations');
    }
}
