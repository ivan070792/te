<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\ReportCategory;
use App\Models\ReportUser;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(['0', '1', '2']), // 0 - не обработно, 1 - в обработке, 2 - обработано
            'report_category_id' => ReportCategory::inRandomOrder()->first()->id,
            'report_user_id' => ReportUser::inRandomOrder()->first()->id,
            'text' => $this->faker->paragraph(3),
        ];
    }
}
