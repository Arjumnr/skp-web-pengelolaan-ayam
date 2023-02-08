<?php

namespace Database\Seeders;

use App\Models\ModelUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $user = [
            [
                'name' => ' Pak Admin',
                'username' => 'admin',
                'password' => bcrypt('111'),
                'role' => 1,
            ],

            [
                'name' => 'Peternak 1',
                'username' => 'pt1',
                'password' => bcrypt('123'),
                'role' => 2,
            ],
            [
                'name' => 'Peternak 2',
                'username' => 'pt2',
                'password' => bcrypt('123'),
                'role' => 2,
            ],
        ];

        foreach ($user as $key => $value) {
            ModelUser::create($value);
        }
    
    }
}
