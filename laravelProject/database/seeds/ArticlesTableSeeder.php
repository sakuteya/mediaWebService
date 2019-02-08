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
        // 1:1でユーザと記事を作成
        factory(App\Models\Article::class, 10, 'user:article_1:1')->create();

        // 1:多でユーザと記事を作成
        $id = factory(App\User::class)->create()->id;
        factory(App\Models\Article::class, 25)->create([
            'user_id' => $id,
        ])->each(function(App\Models\Article $article) {
            $article->tags()->saveMany(factory(App\Models\Tag::class, rand(1, 5))->make());
        });

        //1:多でタグと記事を作成
        factory(App\Models\Tag::class, 5)->create()
        ->each(function(App\Models\Tag $tag) {
            $tag->articles()->saveMany(factory(App\Models\Article::class, rand(20, 50))->make());
        });
    }
}
