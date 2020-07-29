<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //管理者ユーザー
        User::create([
            'name' => '管理者ABC',
            'email' => 'abc@example.com',
            'password' => Hash::make('test1234'),
        ]);
    }
}
