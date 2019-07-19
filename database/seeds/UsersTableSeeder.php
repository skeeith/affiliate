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
        factory(App\User::class, 50)->create()->each(function ($user) {
            for ($i = 0; $i < 10; $i++) {
                $user->projects()->save(factory(App\Project::class)->make());
            }

            for ($i = 0; $i < 10; $i++) {
                $user->projects()->save(factory(App\Partner::class)->make());
            }
        });
    }
}