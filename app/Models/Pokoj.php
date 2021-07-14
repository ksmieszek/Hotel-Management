<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokoj extends Model
{
    use HasFactory;
    protected $fillable=['id','numer_pokoju','pietro','wyposazenie','status','stan','cena'];
	protected $table='pokoje';
	public $timestamps=false;

    public function rezerwacje(){
        return $this->hasMany(Rezerwacja::class);
    }
}
