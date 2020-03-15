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
                'username' => 'admin',
                'phone' => '999999999',
                'email' => 'lxc150896@gmail.com',
                'password' => md5('12345'),
                'role' => 'admin'
            ],
            [
                'username' => 'admin1',
                'phone' => '999999999',
                'email' => 'lxc@gmail.com',
                'password' => md5('12345'),
                'role' => 'admin'
            ],
            [
                'username' => 'admin2',
                'phone' => '999999999',
                'email' => 'admin@gmail.com',
                'password' => md5('12345'),
                'role' => 'admin'
            ],
        ];
        DB::table('customers')->insert($data);
    }
}
