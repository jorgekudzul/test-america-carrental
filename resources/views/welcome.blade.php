@extends('layouts.default')
@section('title', 'Inicio')
@section('content')
<?php $cart = empty(\Session::get('cart')) ? [] : \Session::get('cart') ?>
<div id="main-container" class="container">
    <br>
    <div class="section">
        <div class="row text-center">
            <div class="col-md-12 mb-3">
                <h1>Autos disponibles para ti</h1>
                <subtitle style="color: grey">Encuentra el auto perfecto al mejor precio del mercado</subtitle>
            </div>
        </div>
    </div>

        <!-- ===================================== -->
    <?php if(!empty($cart) ) : ?>
        <div style="padding-right: 4%;" class="row pull-right">
            <button onClick="show()" type="button" class="btn btn-success">Ver Carrito</button>
        </div>
        <br> <br>
    <?php endif ?>

    <?php if(!empty($autos) ) : ?>
    <div class="section">
        <div class="container-fluid">
            <div id="autosCarousel" class="carousel slide" data-ride="carousel1">
                <div class="carousel-inner row w-100 mx-auto">
                    <?php foreach ( $autos as $index => $auto) : ?>
                        <div class="carousel-item col-md-4 <?= $index == 0 ? 'active' : '' ?> ">
                            <div class="card">
                                <div class="contenedor-imagen">
                                    <img class="card-img-top img-fluid" src="{{ asset('storage').'/'.$auto->imagen }}" height="800px">
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><?= $auto->nombre ?></h3>
                                    <div class="container-fluid text-secondary" style="font-size: 14px;">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <subtitle class="float-left"><?= "Auto ".$auto->tipo_precio ?></subtitle>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <subtitle class="float-right"><?= $auto->modulo ?></subtitle>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <i class="fa fa-snowflake-o" aria-hidden="true"></i> <subtitle><?= $auto->aire_acondicionado ? 'A/C' : 'N/A/C' ?></subtitle>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <subtitle class="float-right"><i class="fa fa-suitcase" aria-hidden="true"></i> <?= $auto->num_maletas ?></subtitle>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <subtitle><i class="fa fa-exchange" aria-hidden="true"></i> <?= $auto->transmision ?></subtitle>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <subtitle class="float-right"><i class="fa fa-user" aria-hidden="true"></i>  <?= $auto->num_pasajeros ?></subtitle>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="text-center">
                                        <h1 class="text-info">$<?= number_format($auto->precio, 2) ?></h1>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <?php
                                            $classCss =  'btn-primary';
                                            $label = '¡Reservar Auto!';
                                            $action = 'add';
                                            if(array_key_exists($auto->id, $cart)){
                                                $classCss =  'btn-danger';
                                                $label = 'Eliminar del carrito';
                                                $action = "quickdelete";
                                            }
                                        ?>
                                        <div class="col-md-12">
                                            <button onClick="AddRemove('<?=$action?>', '<?=$auto->id?>')" type="button" class="<?= "rounded-pill btn btn-lg btn-block ".$classCss ?>"><?= $label ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <a class="carousel-control-prev" href="#autosCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#autosCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <p></p>
        </div>
    </div>
    <?php endif ?>
</div>
@endsection

@section('jsfile')
    <script src="js/carousel.js"><script>
@stop

@section('scripts')
<script type="text/javascript" src="js/welcome.js"></script>
@endsection