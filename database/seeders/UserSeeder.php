<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        //
        $users = [
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'gender' => 'Male',
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'role' => 'admin',
                'password' => bcrypt('admin'),
                'status' => 'active',
            ],
            [
                'name' => 'guru 1',
                'email' => 'guru1@gmail.com',
                'gender' => 'Male',
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'role' => 'teacher',
                'password' => bcrypt('guru1'),
                'status' => 'active',
                'major_id' => 1,
            ],
            [
                'name' => 'guru 2',
                'email' => 'guru2@gmail.com',
                'gender' => 'Female',
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'role' => 'teacher',
                'password' => bcrypt('guru2'),
                'status' => 'active',
                'major_id' => 2,
            ],
            [
                'name' => 'guru 3',
                'email' => 'guru3@gmail.com',
                'gender' => 'Male',
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'role' => 'teacher',
                'password' => bcrypt('guru3'),
                'status' => 'active',
                'major_id' => 3,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        foreach (range(1, 5) as $i) {
            User::create([
                'name' => $faker->name,
                'nisn' => '24' . $faker->numberBetween(10000000, 99999999),
                'email' => 'mahasiswa'. $i .'@gmail.com',
                'gender' => $faker->randomElement(['Male', 'Female']),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'role' => 'student',
                'major_id' => 1,
                'status' => 'active',
                'password' => bcrypt('siswa123'),
                'class' => 2,
            ]);
        }

        foreach (range(6, 10) as $i) {
            User::create([
                'name' => $faker->name,
                'nisn' => '24' . $faker->numberBetween(10000000, 99999999),
                'email' => 'mahasiswa'. $i .'@gmail.com',
                'gender' => $faker->randomElement(['Male', 'Female']),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'role' => 'student',
                'status' => 'active',
                'major_id' => 2,
                'password' => bcrypt('siswa123'),
                'class' => 2,
            ]);
        }

        foreach (range(11, 15) as $i) {
            User::create([
                'name' => $faker->name,
                'nisn' => '24' . $faker->numberBetween(10000000, 99999999),
                'email' => 'mahasiswa'. $i .'@gmail.com',
                'gender' => $faker->randomElement(['Male', 'Female']),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'role' => 'student',
                'status' => 'active',
                'major_id' => 3,
                'password' => bcrypt('siswa123'),
                'class' => 2,
            ]);
        }
    }
}
