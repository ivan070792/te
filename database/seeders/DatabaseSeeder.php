<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Report;
use App\Models\ReportCategory;
use App\Models\ReportUser;
use App\Models\Hospital;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Hospital::factory(5)->create();
        // ReportCategory::factory(5)->create();
        ReportCategory::insert([
            [
                'name' => 'Скорая помощь',
                'description' => 'Проблемы с вызовом скорой помощи'
            ],
            [
                'name' => 'Електроннная регистрация',
                'description' => 'Проблемы с электронной регитсрацией'
            ],
            [
                'name' => 'Доступ в больницу',
                'description' => 'Проблемы с доступом в больницу'
            ],
            [
                'name' => 'Иное',
                'description' => 'Иные проблемы'
            ]
        ]);
        ReportUser::factory(15)->create();
        Report::factory(50)->create();
        User::insert([
            'name' => 'admin',
            'email' => '1@mail.ru',
            'password' => bcrypt('admin'),
        ]);
    }
}
