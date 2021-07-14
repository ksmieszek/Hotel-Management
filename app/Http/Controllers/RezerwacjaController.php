<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rezerwacja;
use App\Models\Klient;
use App\Models\Pokoj;
use Carbon\Carbon;

class RezerwacjaController extends Controller
{
    public function showAll()
	{
		$reservations=Rezerwacja::all();
		return view('reservations.showAll',['reservations'=>$reservations]);
	}
	public function edit($id)
	{
		if($id!=-1) $rezerwacja=Rezerwacja::find($id);
		else $rezerwacja = new Rezerwacja(['id'=>-1,'id_pokoju'=>-1,'id_klienta'=>-1,'data_rozpoczecia'=>'','data_zakonczenia'=>'','razem'=>'']);
		
		$klienci = Klient::all();
		$pokoje = Pokoj::all();

		return view('reservations.edit',['rezerwacja'=>$rezerwacja, 'klienci'=>$klienci, 'pokoje'=>$pokoje]);
	}
	public function updateRezerwacja(Request $request,$id)
	{
		$validated = $request->validate([
			'id_pokoju' => 'required',
			'id_klienta' => 'required',
			'data_rozpoczecia' => 'required',
			'data_zakonczenia' => 'required',
		]);

		if($id!=-1) $rezerwacja=Rezerwacja::find($id);
		else $rezerwacja = new Rezerwacja();
		
		$rezerwacja->id_pokoju=$request->input('id_pokoju');
		$rezerwacja->id_klienta=$request->input('id_klienta');
		$rezerwacja->data_rozpoczecia=$request->input('data_rozpoczecia');
		$rezerwacja->data_zakonczenia=$request->input('data_zakonczenia');

		//obliczanie ile do zapłaty za rezerwację
		$start_time = Carbon::parse($request->input('data_rozpoczecia'));
		$finish_time = Carbon::parse($request->input('data_zakonczenia'));
		$total_time = $start_time->diffInDays($finish_time, false);
		$pokoje = Pokoj::all();
		foreach($pokoje as $pokoj)
		{
			if($pokoj->id == $rezerwacja->id_pokoju)
				$cenaZaPokoj= $pokoj->cena;
		}
		$rezerwacja->razem = $total_time * $cenaZaPokoj;

		$rezerwacja->save();
		return redirect('/reservations');
	}
	public function destroy($id)
	{
		$rezerwacja=Rezerwacja::find($id);
		$rezerwacja->delete();
		
		return redirect('/reservations');
	}
}
