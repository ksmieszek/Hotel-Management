<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokojeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pokoje')->insert([
			['numer_pokoju'=>'001','pietro'=>'01','wyposazenie'=>'lodówka, kubki, talerze, czajnik, ręczniki','status'=>'wolny','stan'=>'czysty','cena'=>'50'],
			['numer_pokoju'=>'002','pietro'=>'01','wyposazenie'=>'czajnik, lodówka, biurko, lampka, TV','status'=>'zajęty','stan'=>'brudny','cena'=>'80'],
			['numer_pokoju'=>'003','pietro'=>'02','wyposazenie'=>'kominek, sztućce, prysznic, suszarka do włosów','status'=>'wolny','stan'=>'brudny','cena'=>'80'],
			['numer_pokoju'=>'004','pietro'=>'02','wyposazenie'=>'ręczniki, szampon, talerze, czajnik, TV','status'=>'wolny','stan'=>'czysty','cena'=>'70'],
		]);
    }
}
