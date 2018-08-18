<?php

use Illuminate\Database\Seeder;

class BidsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Bid::class, 120)->create();
    }
}
