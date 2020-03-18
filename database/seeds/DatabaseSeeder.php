<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'cAccName' => 'admin',
                'phone' => '999999999',
                'email' => 'lxc150896@gmail.com',
                'cSecPassWord' => md5('12345'),
                'cPassWord' => md5('12345'),
                'role' => 'admin'
            ],
            [
                'cAccName' => 'admin1',
                'phone' => '999999999',
                'email' => 'lxc@gmail.com',
                'cSecPassWord' => md5('12345'),
                'cPassWord' => md5('12345'),
                'role' => 'admin'
            ],
            [
                'cAccName' => 'admin2',
                'phone' => '999999999',
                'email' => 'admin@gmail.com',
                'cSecPassWord' => md5('12345'),
                'cPassWord' => md5('12345'),
                'role' => 'admin'
            ],
        ];
        DB::table('account_info')->insert($data);
    }
}
