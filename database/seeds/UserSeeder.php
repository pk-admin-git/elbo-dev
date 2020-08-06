<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User;
        $user->name = 'pk-admin';
        $user->email = 'pk@sbigmbh.de';
        $user->password = Hash::make('123ysedcftgb');
        $user->save();
    }
}
