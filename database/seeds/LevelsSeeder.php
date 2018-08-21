<?php

use Illuminate\Database\Seeder;

class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = [
            'name' => 'super admin',
            'description' => 'Super admins have access to all pages on the admin panel'
        ];

        $admin = [
            'name' => 'admin',
            'description' => 'Admins have access to all pages except the admin page'
        ];

        factory(App\Level::class)->create($superAdmin);
        factory(App\Level::class)->create($admin);
    }
}
