<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\UpdatedAt;
use Shared\Domain\ValueObject\Uuid;

class AccountsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('groups')
            ->insert([
                'id' => Uuid::create()->value(),
                'name' => 'Continhas',
                'description' => 'Divisão das continhas do AP',
                'created_at' => CreatedAt::create()->value(),
                'updated_at' => UpdatedAt::create()->value()
            ]);
    }
}
