<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = [
            'autos' => Auto::getAll(),
        ];

        return view('welcome', $datos);
    }

    public function average($a, $b)
    {
        return $a + $b / 2;
    }
}
