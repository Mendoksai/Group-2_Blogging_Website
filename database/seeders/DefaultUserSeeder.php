<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Elms',
            'last_name' => 'Elms',
            'email' => 'sample01@gmail.com',
            'student_instructor_id' => '21-AC-8234',
            'account_role' => 'Instructor',
            'degree_name' => 'BSIT',
            'profile_picture' => 'imgs/profile_pic_ko.jpg',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'istrator',
            'email' => 'admin@gmail.com',
            'student_instructor_id' => '21-AC-0000',
            'account_role' => 'Admin',
            'degree_name' => 'BSIT',
            'profile_picture' => 'imgs/profile_pic_ko.jpg',
            'password' => Hash::make('password'),
        ]);
    }
}
