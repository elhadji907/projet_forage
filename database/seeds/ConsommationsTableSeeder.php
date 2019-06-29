<?php

use Illuminate\Database\Seeder;

class ConsommationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ici on cré des factures qui ne sont liées à aucune consommation
        factory(App\Consommation::class,100)->create(["factures_id"=>null]);
    }
}
