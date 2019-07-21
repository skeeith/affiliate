<?php

use App\Partner;
use App\Project;
use App\User;
use Illuminate\Database\Seeder;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $projects = Project::all();

        foreach ($users as $user) {
            $partner = factory(Partner::class)->make();
            $partner->project_id = rand(1, count($projects));

            for ($i = 0; $i < 1; $i++) {
                $user->partners()->save($partner)->make();
            }
        }
    }
}
