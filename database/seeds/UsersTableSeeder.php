<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'is_active' => '1',
            'name'  => 'MD.Admin',
            'email' => 'lnq.fpt@gmail.com',
            'password' => bcrypt('admin')
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'is_active' => '1',
            'name'  => 'MD.Author',
            'email' => 'lnq.framgia@gmail.com',
            'password' => bcrypt('author')
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'is_active' => '1',
            'name'  => 'MD.Subscriber',
            'email' => 'lnq.dhv@gmail.com',
            'password' => bcrypt('author')
        ]);
        
    }
}
