<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Grade;
use App\Models\Role;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create([
            'name' => 'Student'
        ]);

        Role::create([
            'name' => 'Teacher'
        ]);

        Grade::create([
            'name' => 'SD'
        ]);

        Grade::create([
            'name' => 'SMP'
        ]);

        Grade::create([
            'name' => 'SMA/IPA'
        ]);

        Grade::create([
            'name' => 'SMA/IPS'
        ]);

        Grade::create([
            'name' => 'SMA/Bahasa'
        ]);

        Role::create([
            'name' => 'Student'
        ]);

        Role::create([
            'name' => 'Teacher'
        ]);

        Category::create([
            'name' => 'SD'
        ]);

        Category::create([
            'name' => 'SMP'
        ]);

        Category::create([
            'name' => 'SMA/IPA'
        ]);

        Category::create([
            'name' => 'SMA/IPS'
        ]);

        Category::create([
            'name' => 'SMA/Bahasa'
        ]);

        User::create([
            'username' => 'Student',
            'role_id' => '1',
            'email' => 'student@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'Teacher',
            'role_id' => '2',
            'email' => 'teacher@example.com',
            'password' => Hash::make('password'),
        ]);

        Teacher::create([
            'id' => '1',
            'user_id' => '2',
            'category_id' => '3',
            'fee' => '500000',
            'schedule' => null,
        ]);

        Student::create([
            'id' => '1',
            'user_id' => '1',
            'grade_id' => null,
        ]);
    }
}
