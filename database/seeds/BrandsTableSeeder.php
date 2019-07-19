<?php

use App\Brand;
use App\Partner;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partners = Partner::all();

        foreach ($partners as $partner) {
            for ($i = 0; $i < 5; $i++) {
                $partner->brands()->save(factory(Brand::class)->make());
            }
        }
    }
}
