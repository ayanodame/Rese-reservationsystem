<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '山田花子',
            'email' => 'yamada.hanako@example.com',
            'password' => 'example2',
            'shop_id' =>'1',
        ];
        DB::table('owners')->insert($param);
    }
}
