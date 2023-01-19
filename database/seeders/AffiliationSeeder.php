<?php

namespace Database\Seeders;

use App\Models\Affiliation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AffiliationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const SCHOOLS_NUM = 5;

    public function run()
    {
        //システム管理者
        Affiliation::factory()->create();

        //管理者作成
        Affiliation::factory()
            ->admin()
            ->create();

        //学校アカウント作成
        Affiliation::factory()
            ->count(self::SCHOOLS_NUM)
            ->school()
            ->create();
    }
}
