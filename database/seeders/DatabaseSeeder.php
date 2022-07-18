<?php

namespace Database\Seeders;

use App\Models\User\Role;
use Database\Seeders\User\RoleSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private array $seeders = [
            Role::class => RoleSeeder::class,
        ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->seeders as $model => $seeder) {
            $this->runOnEmptyTable($model, $seeder);
        }
    }

    /**
     * @param string $seeder
     * @param string $model
     */
    public function runOnEmptyTable(string $model, string $seeder)
    {
        if ($model::query()->count() === 0) {
            $this->call($seeder);
        }
    }
}
