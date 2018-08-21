<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(BidsSeeder::class);
        $this->call(LevelsSeeder::class);
        $this->call(AdminsSeeder::class);
    }
}
