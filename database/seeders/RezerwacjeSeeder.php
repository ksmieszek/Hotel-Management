<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RezerwacjeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rezerwacje')->insert([
			['id_pokoju'=>'3','id_klienta'=>'3','data_rozpoczecia'=>'2021-01-29','data_zakonczenia'=>'2021-02-02','razem'=>'320'],
			['id_pokoju'=>'1','id_klienta'=>'2','data_rozpoczecia'=>'2021-02-02','data_zakonczenia'=>'2021-02-10','razem'=>'400'],
			['id_pokoju'=>'4','id_klienta'=>'1','data_rozpoczecia'=>'2021-02-05','data_zakonczenia'=>'2021-02-21','razem'=>'1120'],
		]);
    }
}
