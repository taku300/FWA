<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Affiliation>
 */
class AffiliationFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'システム管理者',
        ];
    }

    //いかstateメソッドを使って登録するデータの状態を作成する
    //定期したものはfactoryのメソッドとして使用できる。
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => '福岡県ウエイトリフティング協会',
            ];
        });
    }
    public function school()
    {
        $schools = [
            ['name' => '福岡県立八幡中央高等学校'],
            ['name' => '福岡県立八幡工業高等学校'],
            ['name' => '福岡県立光陵高等学校'],
            ['name' => '東福岡高等学校'],
            ['name' => '九州国際大学付属高等学校'],
            ['name' => '筑紫大高等学校'],
        ];
        return $this->state(new Sequence(...$schools));
    }
}
