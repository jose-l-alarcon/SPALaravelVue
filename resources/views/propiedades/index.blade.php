@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('propiedades.create',)}}"type="button" class="btn btn-primary btn-sm" >Nueva propiedad</a>
            </br>
            <br>
            <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Propiedad Nro</th>
                <th scope="col">Tipo propiedad</th>
                <th scope="col">registrado por</th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                </tr>
                
            </tbody>
            </table>

            
        </div>
    </div>
</div>
@endsection
