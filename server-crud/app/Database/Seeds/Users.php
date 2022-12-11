<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 500; $i++) {
            $faker = \Faker\Factory::create('id_ID');
            $gender = $faker->randomElement(['male', 'female']);
            $data = [
                'name' => $faker->name($gender),
                'birth_date' => $faker->date('Y-m-d'),
                'birth_place' => $faker->city,
                'gender' => $gender
            ];

            $this->db->table('users')->insert($data);
        }
    }
}
