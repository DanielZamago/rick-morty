<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class PersonajeController extends Controller
{
    public function index(){
        return view('personajes.index');
    }

    public function showAll(){
        $response = Http::get('https://rickandmortyapi.com/api/character');
        $data = $response->json();
        $personajes = $data['results'];
        return view('personajes.showAll', compact('personajes'));
    }

    public function showSaved(){
        return view('personajes.showSaved');
    }
}
