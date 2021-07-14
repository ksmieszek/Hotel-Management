<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlienciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('klienci')->insert([
			['imie'=>'Adam','nazwisko'=>'Jasek','telefon'=>'467245178','pesel'=>'69865645645','plec'=>'mężczyzna'],
			['imie'=>'Małgorzata','nazwisko'=>'Kowalczyk','telefon'=>'688345876','pesel'=>'75876556451','plec'=>'kobieta'],
			['imie'=>'Anna','nazwisko'=>'Nowak','telefon'=>'975678512','pesel'=>'89234523126','plec'=>'kobieta'],
		]);
    }
}
