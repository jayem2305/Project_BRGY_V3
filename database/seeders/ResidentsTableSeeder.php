<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Resident;
class ResidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Resident::create([
            'reg_number' => 'REG_00000000_01',
            'lname' => 'ADMIN',
            'fname' => 'ADMIN',
            'mname' => 'ADMIN',
            'ext' => 'ADMIN',
            'address' => 'ADMIN',
            'household' => 'ADMIN',
            'Birth' => 'ADMIN',
            'birthday' => 'ADMIN',
            'age' => 'ADMIN',
            'cnum' => 'ADMIN',
            'gender' => 'ADMIN',
            'civil' => 'ADMIN',
            'citizenship' => 'ADMIN',
            'occupation' => 'ADMIN',
            'indicate_if' => 'ADMIN',
            'owner_type' => 'ADMIN',
            'owner_name' => 'ADMIN',
            'number_of_family' => 0, // Assuming this is an integer column
            'proof_of_owner' => 'ADMIN',
            'voters_filename' => 'ADMIN',
            'valid_id_filename' => 'ADMIN',
            'image_filename' => 'ADMIN',
            'email' => 'admin@gmail.com', // Assuming this is unique
            'password' => 'Admin@2305', // Hashed password
            'status' => 'Admin',
        ]); //
    }
}
