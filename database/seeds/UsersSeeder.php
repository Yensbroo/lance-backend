<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
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
            'role_id' => '1',
        ];

        factory(App\User::class)->create($admin);
        factory(App\User::class, 25)->create();
    }
}
