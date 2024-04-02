<?php

namespace Database\Seeders;

use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_com_announcements;
use App\Models\planning_com_presentations;
use App\Models\planning_com_reports;
use App\Models\planning_com_reviews;
use App\Models\planning_com_tems;
use App\Models\planning_communication_presentation;
use App\Models\planning_communication_projectAnnouncement;
use App\Models\planning_communication_report;
use App\Models\planning_communication_reviewAndMeeting;
use App\Models\planning_communication_teamMorale;
use App\Models\planning_cost_caseFlow;
use App\Models\planning_cost_incomes;
use App\Models\planning_cost_listAssumsition;
use App\Models\planning_cost_projectIncomeStatement;
use App\Models\planning_procurement_bebanBahan;
use App\Models\planning_procurement_bebanSubkon;
use App\Models\planning_procurement_contracts;
use App\Models\planning_procurement_costContractToValue;
use App\Models\planning_procurement_guarantee;
use App\Models\planning_procurement_termOfPaymentPlan;
use App\Models\planning_procurement_termplans;
use App\Models\planning_quality;
use App\Models\planning_resources;
use App\Models\planning_risk;
use App\Models\planning_schedule;
use App\Models\planning_scope;
use App\Models\planning_stakeholder;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // seeder user login
        $user1 = User::factory()->create([
            'name' => 'shifa',
            'username' => 'shifa',
            'password' => bcrypt('superadmin'),
            'roles' => 'superadmin'
        ]);

        // seeder project definition
        $projectDefinition = Initiating_ProjectDefinition::create([
            'name_project' => 'RADAR GCI',
            'code_project' => 'RDR-567',
            'contract_value' => 2,
            'bussines_line' => 'Goverment',
            'date' => '2024-03-28',
            'status' => 'open',
            'source_ofFunds' => 'PT Berkah Umat',
            'schema_bussines' => 'Commercial',
            'contract_duration' => '2024-03-30',
            'warranty_period' => '2024-03-30',
        ]);
        $projectDefinition1 = Initiating_ProjectDefinition::create([
            'name_project' => 'RADAR GKI',
            'code_project' => 'RDR-123',
            'contract_value' => 3,
            'bussines_line' => 'Goverment',
            'date' => '2024-04-01',
            'status' => 'open',
            'source_ofFunds' => 'PT Berkah Umat',
            'schema_bussines' => 'Commercial',
            'contract_duration' => '2024-04-01',
            'warranty_period' => '2024-04-01',
        ]);

        // seeder planning => scope
        $scope1 = planning_scope::create([
            'technical_requirements' => 'fresh graduate',
            'perfomance_requirements' => 'smart',
            'bussines_requirements' => 'nothing',
            'regulatory_requirements' => 'farmer',
            'user_requirements' => 'bachelor',
            'system_requirements' => 'Laravel',
            'project_definition_id' => 1
        ]);
        $scope2 = planning_scope::create([
            'technical_requirements' => 'experienced',
            'perfomance_requirements' => 'albert einstein',
            'bussines_requirements' => 'spiderman',
            'regulatory_requirements' => 'can fly',
            'user_requirements' => 'lecturer',
            'system_requirements' => 'javascript',
            'project_definition_id' => 2
        ]);

        // seeder planning => schedule
        $schedule1 = planning_schedule::create([
            'task' => 'read book',
            'start_date' => '2024-04-05',
            'finish_date' => '2024-04-15',
            'description_task' => 'can be your girlfriend',
            'assign_to' => 'LEN',
            'project_definition_id' => 1,
        ]);
        $schedule2 = planning_schedule::create([
            'task' => 'swimming',
            'start_date' => '2024-04-02',
            'finish_date' => '2024-04-10',
            'description_task' => 'be smart',
            'assign_to' => 'LEN 2',
            'project_definition_id' => 2,
        ]);

        // seeder planning => cost -> project income statement
        $projectincomestatement1 = planning_cost_incomes::create([
            'cost_category' => 'Direct Cost',
            'description' => 'directed',
            'total' => '2000000',
            'project_definition_id' => 1,
        ]);
        $projectincomestatement2 = planning_cost_incomes::create([
            'cost_category' => 'Indirect Cost',
            'description' => 'no directed',
            'total' => '5000000',
            'project_definition_id' => 2,
        ]);

        // seeder planning => cost -> case flow
        $caseFlow1 = planning_cost_caseFlow::create([
            'nilai_rupiah' => '200000',
            'waktu' => '2024-04-10',
            'project_definition_id' => 1,
        ]);
        $caseFlow2 = planning_cost_caseFlow::create([
            'nilai_rupiah' => '500000',
            'waktu' => '2024-04-20',
            'project_definition_id' => 2,
        ]);

        // seeder planning => cost -> list asumsition
        $listAsumsition1 = planning_cost_listAssumsition::create([
            'deskripsi' => 'you can change the future',
            'project_definition_id' => 1,
        ]);
        $listAsumsition2 = planning_cost_listAssumsition::create([
            'deskripsi' => 'you cannot change your gender',
            'project_definition_id' => 2,
        ]);

        // seeder planning => quality
        $quality1 = planning_quality::create([
            'requirements' => 'must lecturer',
            'category' => 'Technical',
            'project_definition_id' => 1,
        ]);
        $quality2 = planning_quality::create([
            'requirements' => 'independent',
            'category' => 'Performance',
            'project_definition_id' => 2,
        ]);

        // seeder planning => resources
        $resources1 = planning_resources::create([
            'name' => 'fairus',
            'position' => 'Project Director',
            'Duration' => 5,
            'Status' => 'KARTAP',
            'project_definition_id' => 1,
        ]);
        $resources2 = planning_resources::create([
            'name' => 'salimi',
            'position' => 'Project Sponsor',
            'Duration' => 10,
            'Status' => 'KWT',
            'project_definition_id' => 2,
        ]);

        // seeder planning => communicatoin -> reports
        $reports1 = planning_com_reports::create([
            'deliverable' => 'can do this',
            'description' => ' you can try your best',
            'delivery_method' => 'test',
            'frequency' => 'strong',
            'owner' => 'fairus',
            'audience' => 'LEN',
            'project_definition_id' => 1,
        ]);
        $reports2 = planning_com_reports::create([
            'deliverable' => 'cannot do this action',
            'description' => 'you can fly awake',
            'delivery_method' => 'test',
            'frequency' => 'little',
            'owner' => 'salimi',
            'audience' => 'INDONESIA',
            'project_definition_id' => 2,
        ]);

        // seeder planning => communication -> presentations
        $presentations1 = planning_com_presentations::create([
            'deliverable' => 'solat 5 waktu',
            'description' => 'be your friend',
            'delivery_method' => 'test',
            'frequency' => 'mostly',
            'owner' => 'udin',
            'audience' => 'LRS',
            'project_definition_id' => 1,
        ]);
        $presentations2 = planning_com_presentations::create([
            'deliverable' => 'solat taraweh',
            'description' => 'be strong',
            'delivery_method' => 'test',
            'frequency' => 'big',
            'owner' => 'sarip',
            'audience' => 'UPI',
            'project_definition_id' => 2,
        ]);

        // seeder planning => communication -> project announcement
        $projectAnnouncement1 = planning_com_announcements::create([
            'deliverable' => 'training',
            'description' => 'be smart',
            'delivery_method' => 'test',
            'frequency' => 'very long',
            'owner' => 'yanto',
            'audience' => 'IPB',
            'project_definition_id' => 1,
        ]);
        $projectAnnouncement2 = planning_com_announcements::create([
            'deliverable' => 'expert',
            'description' => 'be quiete',
            'delivery_method' => 'test',
            'frequency' => 'small',
            'owner' => 'santi',
            'audience' => 'ITB',
            'project_definition_id' => 2,
        ]);

        // seeder planning => communication -> review and meetings
        $reviewmeeting1 = planning_com_reviews::create([
            'deliverable' => 'sort',
            'description' => 'be sort',
            'delivery_method' => 'test',
            'frequency' => 'very sort',
            'owner' => 'hanip',
            'audience' => 'UGM',
            'project_definition_id' => 1,
        ]);
        $reviewmeeting2 = planning_com_reviews::create([
            'deliverable' => 'long',
            'description' => 'be long',
            'delivery_method' => 'test',
            'frequency' => 'very long',
            'owner' => 'karim',
            'audience' => 'ISI',
            'project_definition_id' => 2,
        ]);

        // seeder planning => communication -> team morale
        $teammorale1 = planning_com_tems::create([
            'deliverable' => 'first',
            'description' => 'be first',
            'delivery_method' => 'test',
            'frequency' => 'very first',
            'owner' => 'ilham',
            'audience' => 'UNDIP',
            'project_definition_id' => 1,
        ]);
        $teammorale2 = planning_com_tems::create([
            'deliverable' => 'not smart',
            'description' => 'be good',
            'delivery_method' => 'test',
            'frequency' => 'very good',
            'owner' => 'lusi',
            'audience' => 'UNINDRAW',
            'project_definition_id' => 2,
        ]);

        // seeder planning => risk
        $risk1 = planning_risk::create([
            'start_date' => '2024-04-07',
            'description_ofrisk' => 'cool',
            'submitter' => 'Project Execution',
            'probability_factor' => 2,
            'impact_factor' => 2,
            'exposure' => 3,
            'Risk_reponse_type' => 'Accept',
            'Risk_reponse_plan' => 'Future',
            'assigned_to' => 'Project Planning',
            'status' => 'Planned',
            'due_date' => '2024-04-20',
            'project_definition_id' => 1,
        ]);
        $risk2 = planning_risk::create([
            'start_date' => '2024-04-04',
            'description_ofrisk' => 'ambisius',
            'submitter' => 'Project Planning',
            'probability_factor' => 1,
            'impact_factor' => 3,
            'exposure' => 2,
            'Risk_reponse_type' => 'Mitigate',
            'Risk_reponse_plan' => 'Present',
            'assigned_to' => 'Project Execution',
            'status' => 'In Process',
            'due_date' => '2024-04-10',
            'project_definition_id' => 2,
        ]);

        // seeder planning => procurement -> cost contract
        $costcontract1 = planning_procurement_contracts::create([
            'value' => 20,
            'contract_value' => 'Beban Bahan',
            'project_definition_id' => 1
        ]);
        $costcontract2 = planning_procurement_contracts::create([
            'value' => 10,
            'contract_value' => 'Beban Subkon',
            'project_definition_id' => 2
        ]);

        // seeder planning => procurement -> beban bahan
        $bebanbahan1 = planning_procurement_bebanBahan::create([
            'procurement' => 'IMPORT',
            'vendor' => 'fairus',
            'description_service' => 'good',
            'volume' => 2,
            'units' => 5,
            'total' => 10000,
            'start_toOrder' => '2024-04-05',
            'finish_toOrder' => '2024-04-10',
            'project_definition_id' => 1,
        ]);

        $bebanbahan2 = planning_procurement_bebanBahan::create([
            'procurement' => 'LOKAL',
            'vendor' => 'salimi',
            'description_service' => 'smart',
            'volume' => 4,
            'units' => 1,
            'total' => 30000,
            'start_toOrder' => '2024-04-10',
            'finish_toOrder' => '2024-04-13',
            'project_definition_id' => 2,
        ]);

        // seeder planning => procurement -> beban subkon
        $bebansubkon1 = planning_procurement_bebanSubkon::create([
            'procurement_subkon' => 'LOKAL',
            'vendor_subkon' => 'salimi',
            'description_service_subkon' => 'smart',
            'volume_subkon' => 4,
            'units_subkon' => 1,
            'total_subkon' => 30000,
            'start_toOrder_subkon' => '2024-04-10',
            'finish_toOrder_subkon' => '2024-04-13',
            'project_definition_id' => 1,
        ]);
        $bebansubkon2 = planning_procurement_bebanSubkon::create([
            'procurement_subkon' => 'IMPOR',
            'vendor_subkon' => 'faius',
            'description_service_subkon' => 'legacy',
            'volume_subkon' => 6,
            'units_subkon' => 2,
            'total_subkon' => 70000,
            'start_toOrder_subkon' => '2024-04-12',
            'finish_toOrder_subkon' => '2024-04-13',
            'project_definition_id' => 2,
        ]);

        // seeder planning => procurement -> term payment
        $termpayment1 = planning_procurement_termplans::create([
            'term_type' => 'superman',
            'value_term' => '20',
            'value_rp_term' => '200000',
            'month_plan' => '2024-04-10',
            'project_definition_id' => 1
        ]);
        $termpayment2 = planning_procurement_termplans::create([
            'term_type' => 'batman',
            'value_term' => '50',
            'value_rp_term' => '300000',
            'month_plan' => '2024-04-09',
            'project_definition_id' => 2
        ]);

        // seeder planning => procurement -> guarantee
        $guarantee1 = planning_procurement_guarantee::create([
            'deskripsi' => 'almost enough',
            'persen' => '20',
            'radio' => 'Available',
            'project_definition_id' => 1,
        ]);
        $guarantee2 = planning_procurement_guarantee::create([
            'deskripsi' => 'enough',
            'persen' => '10',
            'radio' => 'Not Available',
            'project_definition_id' => 2,
        ]);

        // seeder planning => stakeholder 
        $stakeholder1 = planning_stakeholder::create([
            'stakeholder' => 'fairus',
            'role' => 'pejabat',
            'power' => 'High',
            'interest' => 'Medium',
            'initiation' => 'Responsible',
            'planning' => 'Informed',
            'executing' => 'Consulted',
            'control' => 'Responsible',
            'close' => 'Responsible',
            'engagement_level' => 'High',
            'project_definition_id' => 1,
        ]);
        $stakeholder2 = planning_stakeholder::create([
            'stakeholder' => 'salimi',
            'role' => 'CEO',
            'power' => 'Medium',
            'interest' => 'High',
            'initiation' => 'Responsible',
            'planning' => 'Informed',
            'executing' => 'Consulted',
            'control' => 'Responsible',
            'close' => 'Responsible',
            'engagement_level' => 'Low',
            'project_definition_id' => 2,
        ]);
    }
}
