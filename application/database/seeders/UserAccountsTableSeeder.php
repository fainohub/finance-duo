<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\UpdatedAt;
use Shared\Domain\ValueObject\Uuid;

class UserAccountsTableSeeder extends Seeder
{
    public function run()
    {
        $group = DB::table('groups')
            ->where('name', '=', 'Continhas')
            ->first();

        $userOne = DB::table('users')
            ->where('username', '=', 'thiagofaino')
            ->first();

        $userTwo = DB::table('users')
            ->where('username', '=', 'acherpinski')
            ->first();

        DB::table('group_user')
            ->insert([
                [
                    'id' => Uuid::create()->value(),
                    'user_id' => $userOne->id,
                    'group_id' => $group->id,
                    'percentage' => 70,
                    'created_at' => CreatedAt::create()->value(),
                    'updated_at' => UpdatedAt::create()->value()
                ],
                [
                    'id' => Uuid::create()->value(),
                    'user_id' => $userTwo->id,
                    'group_id' => $group->id,
                    'percentage' => 30,
                    'created_at' => CreatedAt::create()->value(),
                    'updated_at' => UpdatedAt::create()->value()
                ]
            ]);
    }
}
