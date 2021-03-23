<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\UpdatedAt;
use Shared\Domain\ValueObject\Uuid;

class ExpenseCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('expense_categories')
            ->insert([
                [
                    'id' => Uuid::create()->value(),
                    'name' => 'Mercado',
                    'created_at' => CreatedAt::create()->value(),
                    'updated_at' => UpdatedAt::create()->value()
                ],
                [
                    'id' => Uuid::create()->value(),
                    'name' => 'Comida',
                    'created_at' => CreatedAt::create()->value(),
                    'updated_at' => UpdatedAt::create()->value()
                ],
                [
                    'id' => Uuid::create()->value(),
                    'name' => 'Transporte',
                    'created_at' => CreatedAt::create()->value(),
                    'updated_at' => UpdatedAt::create()->value()
                ],
                [
                    'id' => Uuid::create()->value(),
                    'name' => 'Luz',
                    'created_at' => CreatedAt::create()->value(),
                    'updated_at' => UpdatedAt::create()->value()
                ],
                [
                    'id' => Uuid::create()->value(),
                    'name' => 'Aluguel',
                    'created_at' => CreatedAt::create()->value(),
                    'updated_at' => UpdatedAt::create()->value()
                ],
                [
                    'id' => Uuid::create()->value(),
                    'name' => 'Internet',
                    'created_at' => CreatedAt::create()->value(),
                    'updated_at' => UpdatedAt::create()->value()
                ]
            ]);
    }
}
