<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Propiedad;
use Illuminate\Http\Request;

class ApiController extends Controller
{


//   obtener todas las categorias 
 public function categorias(){
  $categorias = Categoria::all();
  return response()->json($categorias);

  }


//   mustra la categoria en especifica  
  public function categoria(Categoria $categoria){
    // cambia la forma de busqueda por slug se lo define en el modelo 
    $propiedades = Propiedad::where('categoria_id', $categoria->id)->with('categoria')->get();
    return response()->json($propiedades);
  
  }

  //   obtener una propiedad
 public function show(Propiedad $propiedad){
  return response()->json($propiedad);

  }
  

}
