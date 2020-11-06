
@extends('layouts.default')
@section('title', 'Autos')
@section('content')
<div class="container">
    <br>
    <form action="{{ url('/autos') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-4 form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" valuel="">
        </div>
        <div class="col-md-4 form-group">
            <label for="tipo_precio">Tipo Precio</label>
            <input type="text" class="form-control" name="tipo_precio" id="tipo_precio" valuel="">
        </div>
        <div class="col-md-4 form-group">
            <label for="modulo">Modulo</label>
            <input type="text" class="form-control" name="modulo" id="modulo" value="">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 form-group">
            <label for="num_pasajeros">Número Pasajeros</label>
            <input type="text" class="form-control" name="num_pasajeros" id="num_pasajeros" valuel="">
        </div>
        <div class="col-md-4 form-group">
            <label for="num_maletas">Número Maletas</label>
            <input type="text" class="form-control" name="num_maletas" id="num_maletas" valuel="">
        </div>
        <div class="col-md-2 form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" name="precio" id="precio" valuel="">
        </div>
        <div class="col-md-2 form-group">
            <label for="moneda">Moneda</label>
            <input type="text" class="form-control" name="moneda" id="moneda" valuel="">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 form-group">
            <label for="transmision">Transmision</label>
            <input type="text" class="form-control" name="transmision" id="transmision" value="">
        </div>
        <div class="col-md-4 form-group">
            <label for="imagen">Elegir archivo</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="imagen" id="imagen">
                <label class="custom-file-label" for="imagen">Imagen del auto</label>
            </div>
        </div>
        <div class="col-md-4 form-check">
            <br><br>
            <input type="checkbox" name="aire_acondicionado" class="form-check-input" id="aire_acondicionado" valuel="">
            <label class="form-check-label" for="aire_acondicionado">AA</label>
        </div>
    </div>

    <div class="col-md-4 rigth">
      <button type="submit" class="btn btn-primary mb-2">Agregar</button>
    </div>

    </form>
</div>
@endsection