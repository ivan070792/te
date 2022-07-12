<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Report;
use App\Models\ReportCategory;
use App\Models\ReportUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ReportCategory::factory(5)->create();
        ReportUser::factory(15)->create();
        Report::factory(50)->create();
    }
}
