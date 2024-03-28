<?php

namespace Database\Seeders;

use App\Models\Initiating_ProjectDefinition;
use Illuminate\Database\Seeder;

class ProjectDefinition extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projectDefinition = Initiating_ProjectDefinition::factory()->create([
            'name_project' => 'RADAR GCI',
            'code_project' => 'RDR-567',
            'contract_value' => 2,
            'business_line' => 'Goverment',
            'date' => '2024-03-28',
            'status' => 'open',
            'source_ofFunds' => 'PT Berkah Umat',
            'schema_bussines' => 'Commercial',
            'contract_duration' => '2024-03-30',
            'warranty_period' => '2024-03-30',
        ]);
    }
}
