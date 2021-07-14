<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PracownicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pracownicy')->insert([
			['imie'=>'Karol', 'nazwisko'=>'Śmieszek', 'stanowisko'=>'menager', 'placa'=>'6000'],
			['imie'=>'Tadeusz', 'nazwisko'=>'Młynarczyk', 'stanowisko'=>'recepcjonista', 'placa'=>'4000'],
		]);
    }
}
