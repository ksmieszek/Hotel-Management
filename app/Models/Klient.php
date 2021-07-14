<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klient extends Model
{
    use HasFactory;
    protected $fillable=['id','imie','nazwisko','telefon','pesel','plec'];
	protected $table='klienci';
	public $timestamps=false;

    public function rezerwacje(){
        return $this->hasMany(Rezerwacja::class);
    }
}
