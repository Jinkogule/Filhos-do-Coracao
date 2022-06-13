<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AuthController extends Controller{
    public function index(){
        $events = DB::table('adocaos')->select('*')->inRandomOrder()->paginate(5);
        $events2 = DB::table('users')->select('*')->orderByDesc('id')->paginate(100);
        $events3 = DB::table('adocaogrupos')->select('*')->inRandomOrder()->paginate(5);
        $events4 = DB::table('familias')->select('*')->orderByDesc('id')->paginate(100);

        return View::make('layouts.home')->with('events', $events)->with('events2', $events2)->with('events3', $events3)->with('events4', $events4);
    } 

    /*Login*/
    public function realizarLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('nome', Auth::user()->nome);
            $request->session()->put('id', Auth::user()->id);
            $request->session()->put('user_type', Auth::user()->user_type);
            $request->session()->put('user_email', Auth::user()->email);
    
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'Dados inseridos são inválidos',
            'password' => 'Dados inseridos são inválidos'
        ]);
    }

    /*Cadastro*/
    public function cadastro(){
        return view('layouts.cadastro');
    }
      
    public function realizarCadastro(Request $request){  
        $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->criaUsuario($data);
        
        return redirect("/")->with('message', 'Cadastro realizado com sucesso!');
    }

    public function criaUsuario(array $data){
      return User::create([
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'data_nascimento' => $data['data_nascimento'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'genero' => $data['genero'],
        ]);
    }     

    /*Dashboard*/
    public function dashboard(){
        if(Auth::check()){
            if (Auth::user()->user_type == 'Administrator'){
                return View::make('admin.dashboard');  // admin dashboard path
            }
            else{
                return View::make('user.dashboard');  // member dashboard path
            }   
        }
  
        return back()->withErrors([
            'email' => 'auth nao checked',
            'password' => 'auth nao checked'
        ]);
    }

    /*Sair*/
    public function sair(){
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}