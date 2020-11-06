<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{

    public function __construct() {
        if (!\Session::has('cart')) \Session::put('cart', array());
    }

    public function show()
    {
        $carrito = \Session::get('cart');
        $total = $this->total();

        return view('carrito', compact('carrito', 'total'))->renderSections()['content'];
    }

    public function add( Auto $auto ) {
        $carrito = \Session::get('cart');
        $auto->cantidad = 1;
        $carrito[$auto->id] = $auto;
        \Session::put('cart', $carrito);

        $view = \App::call('App\Http\Controllers\WelcomeController@index');

        return $view->renderSections()['content'];
    }

    public function delete( Auto $auto ) {
        $this->eliminarItem($auto);

        $view = \App::call('App\Http\Controllers\WelcomeController@index');

        return response()->json([
            'carrito' => $this->show(),
            'main' => $view->renderSections()['content']
        ]);
    }

    public function quickDelete( Auto $auto ) {
        $this->eliminarItem($auto);
        
        $view = \App::call('App\Http\Controllers\WelcomeController@index');

        return $view->renderSections()['content'];
    }

    private function eliminarItem( $auto ) {
        $carrito = \Session::get('cart');
        unset($carrito[$auto->id]);
        \Session::put('cart', $carrito);
    }

    public function trash() {
        \Session::forget('cart');

        $view = \App::call('App\Http\Controllers\WelcomeController@index');

        return $view->renderSections()['content'];
    }

    public function update(Auto $auto, $cantidad) {
        $carrito = \Session::get('cart');
        $carrito[$auto->id]->cantidad = $cantidad;
        \Session::put('cart', $carrito);

        return $this->show();
    }

    private function total() {
        $carrito = \Session::get('cart');
        $total = 0;

        foreach ($carrito as $producto) {
            $total += $producto->precio * $producto->cantidad;
        }

        return $total;
    }
}
