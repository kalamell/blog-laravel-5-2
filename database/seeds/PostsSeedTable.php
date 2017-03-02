<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class PostsSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table('posts')->truncate();
        $faker = Factory::create();
        $posts = [];

        $date = Carbon::create(2017, 02, 25, 10);

        for($i = 1; $i<=10; $i++)
        {
          $image = "Post_Image_" . rand(1, 5) . ".jpg";
          //$date = date('Y-m-d H:i:s', strtotime("2017-02-28 14:00:00 +{$i} days"));
          $date->addDays($i);
          $published_date = clone($date);

          $posts[] = [
            'author_id' => rand(1, 3),
            'title' => $faker->sentence(rand(8, 12)),
            'except' => $faker->text(rand(255, 300)),
            'body' => $faker->paragraphs(rand(10, 15), true),
            'slub' => $faker->slug(),
            'image' => rand(0, 1) == 1 ? $image : NULL,
            'created_at' => clone($date),
            'updated_at' => clone($date),
            'view_count' => rand(1, 10) * 10,
    'published_at' => $i < 5 ? $published_date : ( rand(0, 1) == 0 ? NULL : $published_date->addDays(4) )
          ];
        }

        DB::table('posts')->insert($posts);
    }
}
