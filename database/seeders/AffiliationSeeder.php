<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Affiliation;

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
        Affiliation::factory()
            ->system_admin()
            ->create();

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
