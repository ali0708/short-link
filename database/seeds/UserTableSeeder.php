<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0){

            $this->gnerateadmin();
            $this->gneratemanager();
            $this->gnerateuser();
        }

    }

    private function gnerateuser()
    {
        User::create(
            ['name' => 'user1', 'email' => 'user1@gmail.com', 'password' => bcrypt(123456), 'type' => User::TYPE_USER,]
        );
    }

    private function gneratemanager()
    {
        User::create(
            ['name' => 'manager', 'email' => 'manager@gmail.com', 'password' => bcrypt(123456), 'type' => User::TYPE_MANAGER,]
        );
    }

    private function gnerateadmin()
    {
        User::create(
            ['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt(123456), 'type' => User::TYPE_ADMIN,]
        );
    }
}
