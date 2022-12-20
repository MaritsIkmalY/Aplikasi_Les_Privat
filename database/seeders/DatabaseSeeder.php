<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Grade;
use App\Models\Location;
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

        Location::create([
            'name' => 'Batu',
        ]);

        Location::create([
            'name' => 'Bangkalan',
        ]);

        Location::create([
            'name' => 'Banyuwangi',
        ]);

        Location::create([
            'name' => 'Blitar',
        ]);

        Location::create([
            'name' => 'Bojonegoro',
        ]);

        Location::create([
            'name' => 'Bondowoso',
        ]);

        Location::create([
            'name' => 'Gresik',
        ]);

        Location::create([
            'name' => 'Jember',
        ]);

        Location::create([
            'name' => 'Jombang',
        ]);

        Location::create([
            'name' => 'Kediri',
        ]);

        Location::create([
            'name' => 'Lamongan',
        ]);

        Location::create([
            'name' => 'Lumajang',
        ]);

        Location::create([
            'name' => 'Madiun',
        ]);

        Location::create([
            'name' => 'Magetan',
        ]);

        Location::create([
            'name' => 'Malang',
        ]);

        Location::create([
            'name' => 'Mojokerto',
        ]);

        Location::create([
            'name' => 'Nganjuk',
        ]);

        Location::create([
            'name' => 'Ngawi',
        ]);

        Location::create([
            'name' => 'Pacitan',
        ]);

        Location::create([
            'name' => 'Pamekasan',
        ]);

        Location::create([
            'name' => 'Pasuruan',
        ]);

        Location::create([
            'name' => 'Ponorogo',
        ]);

        Location::create([
            'name' => 'Probolinggo',
        ]);

        Location::create([
            'name' => 'Sampang',
        ]);

        Location::create([
            'name' => 'Sidoarjo',
        ]);

        Location::create([
            'name' => 'Situbondo',
        ]);

        Location::create([
            'name' => 'Sumenep',
        ]);

        Location::create([
            'name' => 'Trenggalek',
        ]);

        Location::create([
            'name' => 'Tuban',
        ]);

        Location::create([
            'name' => 'Tulungagung',
        ]);


        Location::create([
            'name' => 'Surabaya',
        ]);
    }
}
