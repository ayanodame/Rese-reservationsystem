<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '寿司',
        ];
        DB::table('genres')->insert($param);
        $param = [
            'name' => '焼肉',
        ];
        DB::table('genres')->insert($param);
        $param = [
            'name' => '居酒屋',
        ];
        DB::table('genres')->insert($param);
        $param = [
            'name' => 'イタリアン',
        ];
        DB::table('genres')->insert($param);
        $param = [
            'name' => 'ラーメン',
        ];
        DB::table('genres')->insert($param);
    }
}
