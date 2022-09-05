<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        DB::table('users')->insert([
            'name'=>'Andrzej Wieczorek',
            'email'=>'andrzej.wieczorek@gmail.com',
            'password'=>bcrypt('zaq1@WSX'),
            'phone'=>'597697485',
            'address'=>'Ujska, Chodziez',
            'status'=>'Active',
            'pesel'=>'97052102486',
            'type'=>'admin'
        ]);

        //pacjent1
        DB::table('users')->insert([
            'name'=>'Jan Kowalski',
            'email'=>'jan.kowalski@gmail.com',
            'password'=>bcrypt('zaq1@WSX'),
            'phone'=>'987156423',
            'address'=>'Wiejska, Chodziez',
            'status'=>'Active',
            'pesel'=>'89045602148',
            'type'=>'patient'
        ]);

        //pacjent2
        DB::table('users')->insert([
            'name'=>'Mateusz Nowak',
            'email'=>'mateusz.nowak@gmail.com',
            'password'=>bcrypt('zaq1@WSX'),
            'phone'=>'478951236',
            'address'=>'Reymonta, Chodziez',
            'status'=>'Active',
            'pesel'=>'94052147886',
            'type'=>'patient'
        ]);

        //lekarz1
        DB::table('users')->insert([
            'name'=>'Adrian Zalewski',
            'email'=>'adrian.zalewski@gmail.com',
            'password'=>bcrypt('zaq1@WSX'),
            'phone'=>'478617778',
            'address'=>'Roosvelta, Warszawa',
            'status'=>'Active',
            'pesel'=>'79112109886',
            'type'=>'doctor'
        ]);

        //lekarz2
        DB::table('users')->insert([
            'name'=>'Adam Lewandowski',
            'email'=>'adam.lewandowski@gmail.com',
            'password'=>bcrypt('zaq1@WSX'),
            'phone'=>'497568123',
            'address'=>'Wielkopolska, Leszno',
            'status'=>'Active',
            'pesel'=>'82052102433',
            'type'=>'doctor'
        ]);

        //specjalizacja1
        DB::table('specializations')->insert([
            'name'=>'onkolog',
        ]);

        //specjalizacja2
        DB::table('specializations')->insert([
            'name'=>'chirurg',
        ]);

        //specjalizacja3
        DB::table('specializations')->insert([
            'name'=>'internista',
        ]);


    }
}
