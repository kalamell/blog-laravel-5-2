<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

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
        for($i = 1; $i<=10; $i++)
        {
          $image = "Post_Image_" . rand(1, 5) . ".jpg";
          $date = date('Y-m-d H:i:s', strtotime("2017-02-28 14:00:00 +{$i} days"));
          $posts[] = [
            'author_id' => rand(1, 3),
            'title' => $faker->sentence(rand(8, 12)),
            'except' => $faker->text(rand(255, 300)),
            'body' => $faker->paragraphs(rand(10, 15), true),
            'slub' => $faker->slug(),
            'image' => rand(0, 1) == 1 ? $image : NULL,
            'created_at' => $date,
            'updated_at' => $date
          ];
        }

        DB::table('posts')->insert($posts);
    }
}
