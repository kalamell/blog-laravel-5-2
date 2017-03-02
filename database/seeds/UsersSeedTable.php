<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset table
        $faker = Factory::create();
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table('users')->truncate();
        DB::table('users')->insert([
          [
            'name' => 'John Doe',
            'slug' => 'john-doe',
            'email' => 'john@xxx.com',
            'password' => bcrypt('123456'),
            'bio' => $faker->text(rand(250, 300))
          ],
          [
            'name' => 'Johny Doe',
            'slug' => 'johnny-doe',
            'email' => 'johnny@xxx.com',
            'password' => bcrypt('123456'),
            'bio' => $faker->text(rand(250, 300))
          ],
          [
            'name' => 'Nattaly Jazzky',
            'slug' => 'nattaly-jazzky',
            'email' => 'nataly@xxx.com',
            'password' => bcrypt('123456'),
            'bio' => $faker->text(rand(250, 300))
          ]
        ]);
    }
}
