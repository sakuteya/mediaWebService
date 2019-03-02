<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ModelsのUserとどっちがいいか？
        factory(App\User::class, 10)->create();
        //testユーザ
        factory(App\User::class)->create([
            'name' => 'てすとくん',
            'email' => 'test001@example.com',
        ]);
    }
}
