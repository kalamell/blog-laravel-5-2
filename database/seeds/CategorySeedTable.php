<?php

use Illuminate\Database\Seeder;

class CategorySeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
          [
            'title' => 'Web Developer',
            'slug' => 'web-developer'
          ],
          [
            'title' => 'Window Developer',
            'slug' => 'window-developer'
          ],
          [
            'title' => 'Java Developer',
            'slug' => 'java-developer'
          ],
          [
            'title' => 'Frontend Develoer',
            'slug' => 'frontend-developer'
          ],
          [
            'title' => 'Backend Developer',
            'slug' => 'backend-developer'
          ]
        ]);

        for($post_id = 1; $post_id <=10; $post_id++) {
          $category_id = rand(1, 5);
          DB::table('posts')->where('id', $post_id)->update([
            'category_id' => $category_id
          ]);
        }

    }
}
