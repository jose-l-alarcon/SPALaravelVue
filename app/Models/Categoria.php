<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
     // Leer las rutas por slug
     public function getRouteKeyName()
     {
         return 'slug';
     }

      // Relación 1:n para categorias y propiedades
    public function propiedades()
    {
        return $this->hasMany(Propiedad::class);
    }

}
