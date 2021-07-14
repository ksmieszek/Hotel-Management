<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezerwacja extends Model
{
    use HasFactory;
    protected $fillable=['id','id_pokoju','id_klienta','data_rozpoczecia','data_zakonczenia','razem'];
	protected $table='rezerwacje';
	public $timestamps=false;

    public function klient(){
        return $this->belongsTo(Klient::class, 'id_klienta');
    }

    public function pokoj(){
        return $this->belongsTo(Pokoj::class, 'id_pokoju');
    }
}
