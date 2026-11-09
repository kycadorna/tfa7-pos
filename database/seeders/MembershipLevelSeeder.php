<?php

namespace Database\Seeders;

use App\Models\MembershipLevel;
use Illuminate\Database\Seeder;

class MembershipLevelSeeder extends Seeder
{
    public function run(): void
    {
        MembershipLevel::updateOrCreate(
            ['level_name' => 'Basic'],
            [
                'fee' => 500,
                'validity_period' => 1,
                'benefits' => 'Basic membership benefits',
            ]
        );

        MembershipLevel::updateOrCreate(
            ['level_name' => 'Silver'],
            [
                'fee' => 1000,
                'validity_period' => 1,
                'benefits' => 'Silver membership benefits',
            ]
        );

        MembershipLevel::updateOrCreate(
            ['level_name' => 'Gold'],
            [
                'fee' => 2000,
                'validity_period' => 1,
                'benefits' => 'Gold membership benefits',
            ]
        );

        MembershipLevel::updateOrCreate(
            ['level_name' => 'Platinum'],
            [
                'fee' => 3000,
                'validity_period' => 1,
                'benefits' => 'Platinum membership benefits',
            ]
        );
    }
}