<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Room;
use App\Type;
use App\Item;
use App\Level;
use App\User;
use App\Employee;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        Level::create(['name'=>'admin']);
        Level::create(['name'=>'operator']);

        User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('apaaja'),
            'level_id'=>1,
        ]);

        User::create([
            'name'=>'Operator',
            'email'=>'operator@gmail.com',
            'password'=>Hash::make('123456'),
            'level_id'=>2,
        ]);

        for($i = 1;$i<=10;$i++)
        {
            Room::create([
                'name'=>"Room - ".$i,
                // 'code'=>'R00'.$i,
                'description'=>$faker->text,
            ]);

            Type::create([
                'name'=>"Type - ".$i,
                // 'code'=>'T00 '.$i,
                'description'=>$faker->text,
            ]);

            $item = ['','Kursi','Meja','Piring','Garpu','Sendok','Taplak','Panci','Handphone','Laptop','Komputer'];

            Item::create([
                'name'=>$item[$i],
                'condition'=>'good',
                'total'=>10,
                'description'=>$faker->text,
                // 'code'=>'A00'.$i,
                'type_id'=>$i,
                'room_id'=>$i,
                'register_date'=>Carbon::now(),
                'user_id'=>1,
            ]);

            Employee::create([
                'name'=>$faker->name,
                'address'=>$faker->address,
                'nip'=>11605501 + $i,
                'username'=>11605501 + $i,
                'password'=>Hash::make(11605501 + $i),
            ]);
        }
    }
}
