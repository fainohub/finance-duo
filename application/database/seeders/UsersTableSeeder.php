<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\UpdatedAt;
use Shared\Domain\ValueObject\Uuid;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')
            ->insert([
                'id' => Uuid::create()->value(),
                'username' => 'thiagofaino',
                'name' => 'Thiago Faino',
                'email' => 'thiagofaino@gmail.com',
                'password' => password_hash('123456', PASSWORD_BCRYPT),
                'created_at' => CreatedAt::create()->value(),
                'updated_at' => UpdatedAt::create()->value()
            ]);

        DB::table('users')
            ->insert([
                'id' => Uuid::create()->value(),
                'username' => 'acherpinski',
                'name' => 'Angela Cherpinski',
                'email' => 'apcherpinski@gmail.com',
                'password' => password_hash('123456', PASSWORD_BCRYPT),
                'created_at' => CreatedAt::create()->value(),
                'updated_at' => UpdatedAt::create()->value()
            ]);
    }
}
