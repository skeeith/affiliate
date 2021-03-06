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
        factory(App\User::class, 1)->create()->each(function ($user) {
            for ($i = 0; $i < 1; $i++) {
                $user->projects()->save(factory(App\Project::class)->make());
            }
        });
    }
}
