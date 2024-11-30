<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 15; $i++) {

            // insert data ke table pegawai menggunakan Faker
            DB::table('users')->insert([
                'name' => $faker->name,
                'username' => $faker->username,
                'email' => $faker->email,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
