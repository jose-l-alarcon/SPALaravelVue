@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>
  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css" 
  integrity="sha256-NkyhTCRnLQ7iMv7F3TQWjVq25kLnjhbKEVPqGJBcCUg=" crossorigin="anonymous" />
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center mt-4">Registrar Propiedad</h1>

        <div class="mt-5 row justify-content-center">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
            <form
                class="col-md-9 col-xs-12 card card-body"
                action="{{route('propiedades.store')}}"
                method="POST"
                enctype="multipart/form-data"
            >
            @csrf
                <fieldset class="border p-4">
                    <legend class="text-primary">Nombre, Categoría e Imagen Principal</legend>

                    <div class="form-group">
                        <label for="nombre">Nombre Propiedad</label>
                        <input
                            id="nombre"
                            type="text"
                            class="form-control @error('nombre') is-invalid @enderror "
                            placeholder="Nombre propiedad"
                            name="nombre"
                            value="{{ old('nombre') }}"
                        >

                        @error('nombre')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="categoria">Categoría</label>

                        <select
                            class="form-control @error('categoria_id') is-invalid @enderror"
                            name="categoria_id"
                            id="categoria"
                        >
                            <option value="" selected disabled>-- Seleccione --</option>

                            @foreach ($categorias as $categoria)
                                <option
                                    value="{{$categoria->id}}"
                                    {{ old('categoria_id') == $categoria->id  ? 'selected' : '' }}
                                    >{{$categoria->nombre}}</option>

                            @endforeach
                        </select>
                        @error('categoria_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="imagen_principal">Imagen Principal</label>
                        <input
                            id="imagen_principal"
                            type="file"
                            class="form-control @error('imagen_principal') is-invalid @enderror "
                            name="imagen_principal"
                            value="{{ old('imagen_principal') }}"
                        >

                        @error('imagen_principal')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                </fieldset>

                <fieldset class="border p-4 mt-5">
                    <legend class="text-primary">Ubicación:</legend>

                    <div class="form-group">
                        <label for="formbuscador">Coloca la dirección de la Propiedad</label>
                        <input
                            id="formbuscador"
                            type="text"
                            placeholder="Calle del Negocio o Establecimiento"
                            class="form-control"
                        >
                        <p class="text-secondary mt-5 mb-3 text-center">El asistente colocará una dirección estimada o mueve el Pin hacia el lugar correcto</p>
                    </div>

                     <div class="form-group">
                        <div id="mapa" style="height: 400px;"></div>
                    </div>

                    <p class="informacion">Confirma que los siguientes campos son correctos</p> 

                 <div class="form-group">
                        <label for="direccion">Dirección</label>

                        <input
                            type="text"
                            id="direccion"
                            class="form-control @error('direccion') is-invalid @enderror"
                            placeholder="Dirección"
                            value="{{old('direccion')}}"
                            name="direccion"
                        >
                        @error('direccion') 
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div> 

                     <div class="form-group">
                        <label for="zona">Zona</label>

                        <input
                            type="text"
                            id="zona"
                            class="form-control @error('zona') is-invalid @enderror"
                            placeholder="zona"
                            value="{{old('zona')}}"
                            name="zona"
                        >
                        @error('zona')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <input type="hidden" id="lat" name="lat" value="{{old('lat')}}">
                    <input type="hidden" id="lng" name="lng" value="{{old('lng')}}"> 

                </fieldset>

                <fieldset class="border p-4 mt-5">
                    <legend  class="text-primary">Información de la Propiedad: </legend>
                        <div class="form-group">
                            <label for="nombre">Teléfono</label>
                            <input
                                type="tel"
                                class="form-control @error('telefono')  is-invalid  @enderror"
                                id="telefono"
                                placeholder="Teléfono"
                                name="telefono"
                                value="{{ old('telefono') }}"
                            >

                                @error('telefono')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                        </div>



                        <div class="form-group">
                            <label for="nombre">Descripción</label>
                            <textarea
                                class="form-control  @error('descripcion')  is-invalid  @enderror"
                                name="descripcion"
                            >{{ old('descripcion') }}</textarea>

                                @error('descripcion')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                        </div>

                </fieldset>

                <fieldset class="border p-4 mt-5">
                    <legend  class="text-primary">Imágenes propiedad: </legend>
                        <div class="form-group">
                            <label for="imagenes">Imagenes</label>
                            <div id="dropzone" class="dropzone form-control"></div>
                        </div> 
                </fieldset> 


                <input type="hidden" id="uuid" name="uuid" value="{{ Str::uuid()->toString()}}"> 
                <input type="submit" class="btn btn-primary mt-3 d-block" value="Registrar propiedad">


            </form> 
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin="">
</script>
<script src="https://unpkg.com/esri-leaflet" defer></script>
  <script src="https://unpkg.com/esri-leaflet-geocoder" defer></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"
   integrity="sha256-OG/103wXh6XINV06JTPspzNgKNa/jnP1LjPP5Y3XQDY=" crossorigin="anonymous" defer></script>

@endsection
