<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klient;

class KlientController extends Controller
{
    public function showAll()
	{
		$clients=Klient::all();
		return view('clients.showAll',['clients'=>$clients]);
	}
	public function edit($id)
	{
		if($id!=-1) $klient=Klient::find($id);
		else $klient = new Klient(['id'=>-1,'imie'=>'','nazwisko'=>'','telefon'=>'','pesel'=>'','plec'=>'']);
		return view('clients.edit',['klient'=>$klient]);
	}
	public function updateKlient(Request $request,$id)
	{
		$validated = $request->validate([
			'imie' => 'required|min:3|max:10',
			'nazwisko' => 'required|min:3|max:15',
			'telefon' => 'required|digits:9',
			'pesel' => 'required|digits:11',
			'plec' => 'required',
		]);

		if($id!=-1) $klient=Klient::find($id);
		else $klient = new Klient();
		
		$klient->imie=$request->input('imie');
		$klient->nazwisko=$request->input('nazwisko');
		$klient->telefon=$request->input('telefon');
		$klient->pesel=$request->input('pesel');
		$klient->plec=$request->input('plec');
		$klient->save();
		
		return redirect('/clients');
	}
	public function destroy($id)
	{
		$klient=Klient::find($id);
		$klient->delete();
		
		return redirect('/clients');
	}
}
