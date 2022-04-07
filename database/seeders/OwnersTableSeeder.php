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
            'name' => '山田一郎',
            'email' => 'yamada.ichiro@example.com',
            'password' => 'example1',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田次郎',
            'email' => 'yamada.jiro@example.com',
            'password' => 'example2',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田三郎',
            'email' => 'yamada.saburo@example.com',
            'password' => 'example3',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田四郎',
            'email' => 'yamada.siro@example.com',
            'password' => 'example4',

        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田五郎',
            'email' => 'yamada.goro@example.com',
            'password' => 'example5',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田六郎',
            'email' => 'yamada.rokuro@example.com',
            'password' => 'example6',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田七郎',
            'email' => 'yamada.shichiro@example.com',
            'password' => 'example7',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田八郎',
            'email' => 'yamada.hachiro@example.com',
            'password' => 'example8',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田九郎',
            'email' => 'yamada.kuro@example.com',
            'password' => 'example9',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田十郎',
            'email' => 'yamada.juro@example.com',
            'password' => 'example10',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田重一郎',
            'email' => 'yamada.juichiro@example.com',
            'password' => 'example11',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田十二郎',
            'email' => 'yamada.juniro@example.com',
            'password' => 'example12',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田十三郎',
            'email' => 'yamada.jusanro@example.com',
            'password' => 'example13',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田重四郎',
            'email' => 'yamada.jushiro@example.com',
            'password' => 'example14',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田重五郎',
            'email' => 'yamada.jugoro@example.com',
            'password' => 'example15',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田十六郎',
            'email' => 'yamada.jurokuro@example.com',
            'password' => 'example16',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田十七郎',
            'email' => 'yamada.jushichiro@example.com',
            'password' => 'example17',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田十八郎',
            'email' => 'yamada.juhachiro@example.com',
            'password' => 'example18',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田十九郎',
            'email' => 'yamada.jukuro@example.com',
            'password' => 'example19',
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田二十郎',
            'email' => 'yamada.nijuro@example.com',
            'password' => 'example20',
        ];
        DB::table('owners')->insert($param);
    }
}
