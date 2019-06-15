<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=App\Type::firstOrCreate(["name"=>"Orange Money"],["uuid"=>Str::uuid()]);
        $role2=App\Type::firstOrCreate(["name"=>"Visa"],["uuid"=>Str::uuid()]);
        $role3=App\Type::firstOrCreate(["name"=>"Cheque"],["uuid"=>Str::uuid()]);
        $role4=App\Type::firstOrCreate(["name"=>"Espece "],["uuid"=>Str::uuid()]);
        $role5=App\Type::firstOrCreate(["name"=>"Wari"],["uuid"=>Str::uuid()]);
        $role5=App\Type::firstOrCreate(["name"=>"Joni Joni"],["uuid"=>Str::uuid()]);
        $role5=App\Type::firstOrCreate(["name"=>"Tigo Cash"],["uuid"=>Str::uuid()]);
    }
}
