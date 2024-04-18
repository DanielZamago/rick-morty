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
        return view('personajes.showAll');
    }

    public function showSaved(){
        return view('personajes.showSaved');
    }

    public function search(Request $request){
        
        $response = Http::get('https://rickandmortyapi.com/api/location/'.$request->input('idLocalizacion'));
        $data = $response->json();
        $locaciones = $data;
        $maximo = 1;
        $ids = [];
        $personajes = [];
        if(isset($locaciones['residents'])){
            foreach($locaciones['residents'] as $residente){
                $id = explode("/", $residente);
                array_push($ids, $id[5]);
                if($maximo >= 5){
                    break;
                }
                $maximo++;
            }
            $personajes = Http::get('https://rickandmortyapi.com/api/character/'.implode(",", $ids))->json();
        }

        if(isset($personajes['id'])){
            $personajes = [$personajes];
        }

        return response(json_encode($personajes),200)->header('Content-Type', 'text/plain');

    }
}
