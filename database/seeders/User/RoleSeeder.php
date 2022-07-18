<?php

namespace Database\Seeders\User;

use App\Models\User\Role;
use Illuminate\Database\Seeder;
use Symfony\Component\Yaml\Yaml;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Yaml::parseFile(database_path('fixtures/roles.yml'));

        foreach ($roles as ['name' => $name, 'code' => $code]) {
            Role::query()->create([
                'name' => $name,
                'code' => $code,
            ]);
        }
    }
}
