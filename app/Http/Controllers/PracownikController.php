<?php

namespace App\Http\Controllers;

use App\Models\Pracownik;
use Illuminate\Http\Request;

class PracownikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pracownicy = Pracownik::all();
		return view('employees.showAll', ['pracownicy'=>$pracownicy]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pracownik = new Pracownik(['id'=>-1, 'imie'=>'', 'nazwisko'=>'', 'stanowisko'=>'', 'placa'=>'']);
		return $this->edit($pracownik);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pracownik = new Pracownik();
		return $this->update($request, $pracownik);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pracownik  $pracownik
     * @return \Illuminate\Http\Response
     */
    public function show(Pracownik $pracownik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pracownik  $pracownik
     * @return \Illuminate\Http\Response
     */
    public function edit(Pracownik $pracownik)
    {
        //
        if($pracownik != null)
			return view('employees.edit', ['pracownik'=>$pracownik]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pracownik  $pracownik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pracownik $pracownik)
    {
        //
        $validated = $request->validate([
			'imie' => 'required|min:3|max:10',
			'nazwisko' => 'required|min:3|max:15',
			'stanowisko' => 'required|min:3|max:15',
			'placa' => 'required|numeric',
		]);

        if($pracownik != null) { 		
			$pracownik->imie = $request->input('imie');
			$pracownik->nazwisko = $request->input('nazwisko');
			$pracownik->stanowisko = $request->input('stanowisko');
			$pracownik->placa = $request->input('placa');
			$pracownik->save();
		}
		
		return redirect('/pracowniks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pracownik  $pracownik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pracownik $pracownik)
    {
        //
        $pracownik->delete();
		return redirect('/pracowniks');
    }
}
