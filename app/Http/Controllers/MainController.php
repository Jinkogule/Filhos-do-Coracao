<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function realizarBusca(Request $request){
        $busca = $request->input('busca');

        $events = DB::table('conteudos')->select('*')->where('titulo', 'like', '%'.$busca.'%')->orWhere('texto', 'like', '%'.$busca.'%')->orderByDesc('id')->paginate(100);

        return View::make('layouts.busca')->with('events', $events)->with('busca', $busca);
    }
}
