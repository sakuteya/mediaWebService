<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('articles')->insert([
            [
              'title' => 'ブック１',
              'body' => '本文１',
              'user_id' => 1,
            ],
            [
                'title' => 'ブック２',
                'body' => '本文２',
                'user_id' => 1,
            ],
            [
                'title' => 'ブック３',
                'body' => '本文３',
                'user_id' => 1,
            ],
        ]); 
    }
}
