<?php

use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'email' => 'admin@mail.com',
            'full_name' => 'admin',
            'password' => bcrypt('123pass'),
            'level_id' => 1
        ];

        factory(App\Admin::class)->create($admin);
    }
}
