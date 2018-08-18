<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'admin'
        ];
        $user = [
            'name' => 'user'
        ];

        factory(App\Role::class)->create($admin);
        factory(App\Role::class)->create($user);
    }
}
