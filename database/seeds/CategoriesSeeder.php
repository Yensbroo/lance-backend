<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $web = [
        'name' => 'Web',
        'slug' => 'web'
    ];
    $marketing = [
       'name' => 'Marketing',
       'slug' => 'marketing'
    ];
    $design = [
        'name' => 'UI/UX Design',
        'slug' => 'ui-ux'
    ];
    $foto = [
        'name' => 'Fotografie',
        'slug' => 'fotografie'
    ];
    $audio = [
        'name' => 'Audio & Video',
        'slug' => 'audio-video'
    ];
    $ddd = [
        'name' => '3D',
        'slug' => '3d'
    ];

    factory(App\Category::Class)->create($web);
    factory(App\Category::Class)->create($marketing);
    factory(App\Category::Class)->create($design);
    factory(App\Category::Class)->create($foto);
    factory(App\Category::Class)->create($audio);
    factory(App\Category::Class)->create($ddd);
    }
}
