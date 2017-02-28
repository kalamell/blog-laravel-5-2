<?php

use Illuminate\Database\Seeder;

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
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table('users')->truncate();
        DB::table('users')->insert([
          [
            'name' => 'John Doe',
            'email' => 'john@xxx.com',
            'password' => bcrypt('123456')
          ],
          [
            'name' => 'Johny Doe',
            'email' => 'johnny@xxx.com',
            'password' => bcrypt('123456')
          ],
          [
            'name' => 'Nattaly',
            'email' => 'nataly@xxx.com',
            'password' => bcrypt('123456')
          ]
        ]);
    }
}
