<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TaskStatus;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => 'Новый'],
            ['name' => 'В работе'],
            ['name' => 'На тестировании'],
            ['name' => 'Завершен'],
        ];

        foreach ($statuses as $status) {
            TaskStatus::create($status);
        }
    }
}
