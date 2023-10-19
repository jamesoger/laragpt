<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * class pour l'acceuil du site
 */

class AcceuilController extends Controller
{
    /**
     * fonction pour l'acceuil
     *
     * @return view
     */
    public function index() {
        return view('index');
    }
}
