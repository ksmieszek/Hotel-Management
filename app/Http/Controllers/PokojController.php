<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokoj;

class PokojController extends Controller
{
    public function showAll()
	{
		$rooms=Pokoj::all();
		return view('rooms.showAll',['rooms'=>$rooms]);
	}
	public function edit($id)
	{
		if($id!=-1) $pokoj=Pokoj::find($id);
		else $pokoj = new Pokoj(['id'=>-1,'numer_pokoju'=>'','pietro'=>'','wyposazenie'=>'','status'=>'','stan'=>'','cena'=>'']);
		return view('rooms.edit',['pokoj'=>$pokoj]);
	}
	public function updatePokoj(Request $request,$id)
	{
		$validated = $request->validate([
			'numer_pokoju' => 'required',
			'pietro' => 'required|numeric',
			'wyposazenie' => 'required|min:3|max:40',
			'status' => 'required',
			'stan' => 'required',
			'cena' => 'required|numeric',
		]);

		if($id!=-1) $pokoj=Pokoj::find($id);
		else $pokoj = new Pokoj(); 
		
		$pokoj->numer_pokoju=$request->input('numer_pokoju');
		$pokoj->pietro=$request->input('pietro');
		$pokoj->wyposazenie=$request->input('wyposazenie');
		$pokoj->status=$request->input('status');
		$pokoj->stan=$request->input('stan');
		$pokoj->cena=$request->input('cena');
		$pokoj->save();
		
		return redirect('/rooms');
	}
	public function destroy($id)
	{
		$pokoj=Pokoj::find($id);
		$pokoj->delete();
		
		return redirect('/rooms');
	}
}
