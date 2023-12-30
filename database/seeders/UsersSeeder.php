<?php

namespace Database\Seeders;

use App\Models\{
    Judge,
    Lawyer,
    User
};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_judge = User::create([
            'name' => 'Juiz',
            'email' => 'juiz@teste.com',
            'password' => bcrypt('123456'),
        ]);
        $user_judge->assignRole('judge');

        $judge = Judge::create([
            'user_id' => $user_judge->id,
        ]);

        $user_lawyer = User::create([
            'name' => 'Advogado',
            'email' => 'advogado@teste.com',
            'password' => bcrypt('123456'),
        ]);

        $user_lawyer->assignRole('lawyer');

        $lawyer = Lawyer::create([
            'user_id' => $user_lawyer->id,

            'description' => 'Advogado com 10 anos de experiência',
            'oab' => '123456',
            'uf_oab' => 'PI',
            'phone' => '86999999999',
        ]);
    }
}
