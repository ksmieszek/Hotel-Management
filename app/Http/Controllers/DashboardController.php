<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rezerwacja;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function getCurrentNumbersOfReservations()
	{
		$reservations=Rezerwacja::all();
        $licznikAktywnychRezerwacji=0;
        $licznikPrzyjazow=0;
        $licznikWyjazdow=0;
        $dzisiejszaData=Carbon::parse(date("Y-m-d")); 

        foreach($reservations as $reservation)
        {
            $start_time = Carbon::parse($reservation->data_rozpoczecia);
            $finish_time = Carbon::parse($reservation->data_zakonczenia);
            
            //obliczenie aktywnych rezerwacji w dniu dzisiejszym 
            if($start_time < $dzisiejszaData && $finish_time > $dzisiejszaData)
                $licznikAktywnychRezerwacji++; 

            //obliczenie przyjazdów gości w dniu dzisiejszym 
            if($start_time == $dzisiejszaData)
                $licznikPrzyjazow++;

            //obliczenie wyjazdów gości w dniu dzisiejszym 
            if($finish_time == $dzisiejszaData)
                $licznikWyjazdow++;
        }

		return view('dashboard',['aktywne'=>$licznikAktywnychRezerwacji,'przyjazdy'=>$licznikPrzyjazow,'wyjazdy'=>$licznikWyjazdow]);
	}
}
