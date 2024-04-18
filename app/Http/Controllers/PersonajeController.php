<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Personaje;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class PersonajeController extends Controller
{
    public function index(){
        return view('personajes.index');
    }

    public function showAll(){
        return view('personajes.showAll');
    }

    public function showSaved(){
        $personajes = Personaje::all();
        return view('personajes.showSaved', compact('personajes'));
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
        
        usort($personajes, function($a, $b) {
            return $a['name'] <=> $b['name'];
        });

        return response(json_encode($personajes),200)->header('Content-Type', 'text/plain');

    }

    public function create(Request $request){
        $personaje = new Personaje();
        $idPersonaje = Http::get('https://rickandmortyapi.com/api/character/'.$request->input('idPersonaje'))->json();
        
        $personajeExistente = Personaje::where('idPersonaje', $idPersonaje['id'])->first();
        if($personajeExistente){
            session()->flash('error', 'El personaje ya ha sido guardado');
            return view('personajes.index');
        }

        $personaje->idPersonaje = $idPersonaje['id'];
        $personaje->nombre = $idPersonaje['name'];
        $personaje->especie = $idPersonaje['species'];
        $personaje->estado = $idPersonaje['status'];
        $personaje->tipo = $idPersonaje['type'];
        $personaje->genero = $idPersonaje['origin']['name'];
        $personaje->imagen = $idPersonaje['image'];
        $personaje->save();

        session()->flash('mensaje', 'Personaje guardado correctamente');
        return view('personajes.index');
    }

    public function delete(Request $request){
        $idPersonaje = $request->input('idPersonaje');
        $personaje = Personaje::where('idPersonaje', $idPersonaje)->first();
        if($personaje) {
            $personaje->delete();
            session()->flash('mensaje', 'Personaje eliminado correctamente');
        } else {
            session()->flash('error', 'Personaje no encontrado');
        }

        return view('personajes.index');
    }

}
