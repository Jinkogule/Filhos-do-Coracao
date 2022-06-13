<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crianca;
use App\Models\Familia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller{

    /*Registro*/
    public function registro_de_crianca(){
        return view('admin.registro_de_crianca');
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required',
            'idade' => 'required',
            'sexo' => 'required',
            'estado_de_saude' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,jfif,svg|max:2048']
        );

        $file = $request->file('image');

        $path = Storage::disk('s3')->put('imagens', $file);

        Storage::disk('s3')->setVisibility($path, 'public');
        

        $data = $request->all();
            
        Crianca::create([
            'nome' => $data['nome'],
            'idade' => $data['idade'],
            'sexo' => $data['sexo'],
            'estado_de_saude' => $data['estado_de_saude'],
            'localizacao' => $data['localizacao'],
            'descricao' => $data['descricao'],
            "file_path" => Storage::disk('s3')->url($path)
        ]);
        
        return redirect("/dashboard")->with('message', 'Criança registrada com sucesso!');
    }
  
    public function aprovarAdocao(Request $request){
        $request->validate([
            'adocao_id' => 'required',
            'adotada_id' => 'required',
            'adotante_email' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();

        DB::table('adocaos')->where('id', $data['adocao_id'])->update(['status' => $data['status']]);
        DB::table('criancas')->where('id', $data['adotada_id'])->update(['status' => 'Em estágio inicial de adoção']);

        return redirect("/dashboard")->with('message', 'Adoção aprovada com sucesso!')->with('warning', $data['adotante_email']);
    }

    public function reprovarAdocao(Request $request){
        $request->validate([
            'adocao_id' => 'required',
            'adotada_id' => 'required',
            'adotante_email' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();
        
        DB::table('adocaos')->where('id', $data['adocao_id'])->update(['status' => $data['status']]);
        DB::table('criancas')->where('id', $data['adotada_id'])->update(['status' => 'Esperando adoção']);
    
        return redirect("/dashboard")->with('message', 'Adoção reprovada com sucesso!')->with('warning', $data['adotante_email']);
    }

    public function aprovarAdocaoGrupo(Request $request){
        $request->validate([
            'adocao_id' => 'required',
            'familia_id' => 'required',
            'adotante_email' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();

        DB::table('adocaogrupos')->where('id', $data['adocao_id'])->update(['status' => $data['status']]);
        DB::table('familias')->where('id', $data['familia_id'])->update(['status' => 'Em estágio inicial de adoção']);

        return redirect("/dashboard")->with('message', 'Adoção aprovada sucesso!')->with('warning', $data['adotante_email']);
    }

    public function reprovarAdocaoGrupo(Request $request){
        $request->validate([
            'adocao_id' => 'required',
            'familia_id' => 'required',
            'adotante_email' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();
        
        DB::table('adocaogrupos')->where('id', $data['adocao_id'])->update(['status' => $data['status']]);
        DB::table('familias')->where('id', $data['familia_id'])->update(['status' => 'Esperando adoção']);
    
        return redirect("/dashboard")->with('message', 'Adoção reprovada com sucesso!')->with('warning', $data['adotante_email']);
    }

    public function adocoesPendentes(){
        $events = DB::table('adocaos')->select('*')->orderByDesc('id')->paginate(100);
        $events2 = DB::table('adocaogrupos')->select('*')->orderByDesc('id')->paginate(100);
        $events3 = DB::table('familias')->select('*')->orderByDesc('id')->paginate(100);

        return View::make('admin.adocoes_pendentes')->with('events', $events)->with('events2', $events2)->with('events3', $events3);
    }
    
    public function candidatosAPais(){
        $events = DB::table('users')->select('*')->orderByDesc('id')->paginate(100);

        return View::make('admin.candidatos_a_pais')->with('events', $events);
    }

    public function registro_de_familia(){
        return view('admin.registro_de_familia');
    }

    public function storeFamilia(Request $request){
        $request->validate([
            'nomes' => 'required',
            'idades' => 'required',
            'sexos' => 'required',
            'estados_de_saude' => 'required',
            'q_irmaos' => 'required',
            'localizacao' => 'required',
            'descricao' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,jfif,svg|max:2048']
        );

        $file = $request->file('image');

        $path = Storage::disk('s3')->put('imagens_familia', $file);

        Storage::disk('s3')->setVisibility($path, 'public');
        

        $data = $request->all();
            
        Familia::create([
            'nomes' => $data['nomes'],
            'idades' => $data['idades'],
            'sexos' => $data['sexos'],
            'q_irmaos' => $data['q_irmaos'],
            'estados_de_saude' => $data['estados_de_saude'],
            'localizacao' => $data['localizacao'],
            'descricao' => $data['descricao'],
            "file_path" => Storage::disk('s3')->url($path)
        ]);
        
        return redirect("/dashboard")->with('message', 'Criança registrada com sucesso!');
    }
}
