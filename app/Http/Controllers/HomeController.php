<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function processo_de_adocao(){

        return View::make('layouts.processo_de_adocao');
    }
    
    public function cases_de_sucesso(){
        $events = DB::table('adocaos')->select('*')->where('status', 'Concluída com sucesso')->orderByDesc('id')->paginate(100);
        $events2 = DB::table('users')->select('*')->orderByDesc('id')->paginate(100);
        $events3 = DB::table('adocaogrupos')->select('*')->where('status', 'Concluída com sucesso')->orderByDesc('id')->paginate(100);
        $events4 = DB::table('familias')->select('*')->orderByDesc('id')->paginate(100);

        return View::make('layouts.cases_de_sucesso')->with('events', $events)->with('events2', $events2)->with('events3', $events3)->with('events4', $events4);
    } 
}
