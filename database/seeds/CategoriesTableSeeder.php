<?php

use App\Category;
use App\Project;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::all();

        $total = 10;
        $counter = 5; // make sure this is lower than $total

        foreach ($projects as $project) {
            for ($i = 0; $i < $total; $i++) {
                if ($i >= $counter) {
                    $category = factory(Category::class)->make();
                    $category->parent_id = rand(1, $counter);

                    $project->categories()->save($category);
                } else {
                    $project->categories()->save(factory(Category::class)->make());
                }
            }
        }
    }
}
