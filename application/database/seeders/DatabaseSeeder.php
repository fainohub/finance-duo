<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AccountsTableSeeder::class,
            UsersTableSeeder::class,
            UserAccountsTableSeeder::class,
            ExpenseCategoriesTableSeeder::class
        ]);
    }
}
