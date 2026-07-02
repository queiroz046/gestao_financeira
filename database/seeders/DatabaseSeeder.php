<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin Financeiro',
            'email' => 'admin@financeiro.test',
            'role' => 'admin',
        ]);

        $user = User::factory()->create([
            'name' => 'Usuário Padrão',
            'email' => 'user@financeiro.test',
            'role' => 'user',
        ]);

        Category::insert([
            ['name' => 'Salário', 'type' => 'receita', 'user_id' => $admin->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Investimentos', 'type' => 'receita', 'user_id' => $admin->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Alimentação', 'type' => 'despesa', 'user_id' => $admin->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Transporte', 'type' => 'despesa', 'user_id' => $admin->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Salário', 'type' => 'receita', 'user_id' => $user->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Alimentação', 'type' => 'despesa', 'user_id' => $user->id, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
