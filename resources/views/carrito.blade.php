@section('content')
    <h1> Carrito </h1>

    <?php if(!empty($carrito) ) : ?>
        <div class="row pull-right" style="padding-right: 5%">
            <button onClick="trash()" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Vaciar carrito</button>
        </div>
        <br> <br>
    <?php endif ?>

    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Actualizar</th>
        <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach( $carrito as $key => $producto) : ?>
            <?php $class = $key % 2 == 0 ? "bg-primary" : '' ?>
            <tr class=$class>
                <td>
                    <?= $producto->nombre ?>
                </td>
                <td>
                    <div class="input-group mb-3 col-md-6 col-sm-12">
                        <div class="input-group-prepend">
                            <button onClick="upDown('-', $('#cantidad<?= $producto->id ?>'))" class="btn btn-danger btn-outline-secondary" type="button"><i class="text-white fa fa-minus" aria-hidden="true"></i></button>
                        </div>
                        <input id="cantidad<?= $producto->id ?>" data-id-row="<?= $producto->id ?>" type="text" class="form-control" aria-label="Quantity" data-initial-value="<?= $producto->cantidad ?>" value="<?= $producto->cantidad ?>">
                        <div class="input-group-append">
                            <button onClick="upDown('+', $('#cantidad<?= $producto->id ?>'))" class="btn btn-success btn-outline-secondary" type="button"><i class="text-white fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </td>
                <td class="text-center">
                    $<?= number_format($producto->precio * $producto->cantidad, 2) ?>
                </td>
                <td class="text-center">
                    <button id="btnUpdate<?= $producto->id ?>" type="button" onClick="update($('#cantidad<?= $producto->id ?>'))" disabled="disabled" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </td>
                <td class="text-center">
                    <button onClick="deleteItem('<?=$producto->id?>')" type="button" class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"></i></button>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </table>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h3>Total a pagar: $<?= number_format($total, 2) ?></h3>
            </div>
        </div>
    </div>

    <script src="js/carrito.js"><script>
@endsection