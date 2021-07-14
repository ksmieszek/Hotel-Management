<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pracownik extends Model
{
    use HasFactory;
    protected $fillable=['id','imie','nazwisko','stanowisko','placa'];
	protected $table = 'pracownicy';
	public $timestamps = false;
}
