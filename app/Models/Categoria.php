<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tienda;

class Categoria extends Model
{
    use HasFactory;

    public function tiendas(){
        return $this->hasMany(Tienda::class);
    }
}
