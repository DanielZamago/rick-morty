<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonajeController extends Controller
{
    public function index(){
        return view('personajes.index');
    }

    public function showAll(){
        return view('personajes.showAll');
    }

    public function showSaved(){
        return view('personajes.showSaved');
    }
}
