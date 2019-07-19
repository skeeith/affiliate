<?php

use App\Article;
use App\Brand;
use App\Category;
use App\Partner;
use App\User;
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
        $users = User::all();
        $partners = Partner::all();
        $categories = Category::all();
        $brands = Brand::all();

        foreach ($users as $user) {
            $article = factory(Article::class)->make();
            $article->partner_id = rand(1, count($partners));
            $article->category_id = rand(1, count($categories));
            $article->brand_id = rand(1, count($brands));

            for ($i = 0; $i < 50; $i++) {
                $user->articles()->save($article)->make();
            }
        }
    }
}
