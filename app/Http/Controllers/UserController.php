<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adocao;
use App\Models\Adocaogrupo;
use App\Models\Fila;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function registrarAdocao(Request $request){
        $request->validate([
            'adotante' => 'required',
            'adotante_id' => 'required',
            'adotante_email' => 'required',
            'adotada' => 'required',
            'adotada_id' => 'required',
            'motivacao' => 'required',
            'data' => 'required',
            'status' => 'required']
        );
        $data = $request->all();
        $check = $this->criaAdocao($data);

        return redirect("/dashboard")->with('message', 'Solicitação de adoção realizada com sucesso!');
    }

    public function criaAdocao(array $data){
        DB::table('criancas')->where('id', $data['adotada_id'])->update(['status' => "Em processo de adoção"]);
        return Adocao::create([
            'adotante' => $data['adotante'],
            'adotante_id' => $data['adotante_id'],
            'adotante_email' => $data['adotante_email'],
            'adotada' => $data['adotada'],
            'adotada_id' => $data['adotada_id'],
            'data' => $data['data'],
            'motivacao' => $data['motivacao'],
            'status' => $data['status'],
        ]);
    }

    public function minhasAdocoes(){
        $events = DB::table('adocaos')->select('*')->where('adotante_id', session('id'))->orderBy('status')->paginate(100);
        $events2 = DB::table('criancas')->select('*')->orderBy('id')->paginate(100);

        $events3 = DB::table('adocaogrupos')->select('*')->where('adotante_id', session('id'))->orderBy('status')->paginate(100);
        $events4 = DB::table('familias')->select('*')->orderBy('id')->paginate(100);

        return View::make('user.minhas_adocoes')->with('events', $events)->with('events2', $events2)->with('events3', $events3)->with('events4', $events4);
    }

    public function criancasParaAdocao(){
        $events = DB::table('criancas')->select('*')->orderBy('created_at')->paginate(100);

        return View::make('user.criancas_para_adocao')->with('events', $events);
    }

    public function conteudoCriancas($nome, $id){
        $events = DB::select("SELECT * FROM criancas WHERE id = '$id' AND nome = '$nome'");
        $events2 = DB::select("SELECT * FROM users WHERE id = '$id' AND nome = '$nome'");
        return View::make('user.crianca')->with('events', $events);
    }

    public function cancelarSolicitacaoDeAdocao(Request $request){
        $request->validate([
            'adocao_id' => 'required',
            'adotada_id' => 'required']
        );
        $data = $request->all();

        DB::table('adocaos')->where('id', $data['adocao_id'])->delete();
        DB::table('criancas')->where('id', $data['adotada_id'])->update(['status' => 'Esperando adoção']);

        return redirect("/dashboard")->with('message', 'Solicitação de adoção cancelada com sucesso!');
    }

    public function AdocaoBemSucedida(Request $request){
        $request->validate([
            'depoimento' => 'required',
            'adotante_id' => 'required',
            'adocao_id' => 'required',
            'adotada_id' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();
        
        DB::table('adocaos')->where('id', $data['adocao_id'])->update(['status' => $data['status']]);
        DB::table('adocaos')->where('id', $data['adocao_id'])->update(['depoimento' => $data['depoimento']]);

        DB::table('criancas')->where('id', $data['adotada_id'])->update(['status' => 'Adotada com sucesso']);
    
        return redirect("/dashboard")->with('message', 'Adoção concluída com sucesso!');
    }

    public function AdocaoMalSucedida(Request $request){
        $request->validate([
            'depoimento' => 'required',
            'adotante_id' => 'required',
            'adocao_id' => 'required',
            'adotada_id' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();
        
        DB::table('adocaos')->where('id', $data['adocao_id'])->update(['status' => $data['status']]);
        DB::table('criancas')->where('id', $data['adotada_id'])->update(['status' => 'Esperando adoção']);
    
        return redirect("/dashboard")->with('message', 'Adoção malsucedida com sucesso!');
    }

    public function store(Request $request){
        $request->validate([
            'adocao_id' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,jfif,svg|max:2048']
        );

        $file = $request->file('image');

        $path = Storage::disk('s3')->put('foto_familia', $file);

        Storage::disk('s3')->setVisibility($path, 'public');
        
        $data = $request->all();
        
        DB::table('adocaos')->where('id', $data['adocao_id'])->update(['file_path' => Storage::disk('s3')->url($path)]);

        return redirect("/dashboard")->with('message', 'Imagem da família carregada com sucesso!');
    }

    public function familiasParaAdocao(){
        $events = DB::table('familias')->select('*')->orderBy('created_at')->paginate(100);

        return View::make('user.familias_para_adocao')->with('events', $events);
    }

    public function conteudoFamilias($id){
        $events = DB::select("SELECT * FROM familias WHERE id = '$id'");
        ;
        return View::make('user.familia')->with('events', $events);
    }

    public function registrarAdocaoFamilia(Request $request){
        $request->validate([
            'adotante' => 'required',
            'adotante_id' => 'required',
            'adotante_email' => 'required',
            'familia_id' => 'required',
            'motivacao' => 'required',
            'data' => 'required',
            'status' => 'required']
        );
        $data = $request->all();
        $check = $this->criaAdocaoFamilia($data);

        return redirect("/dashboard")->with('message', 'Solicitação de adoção realizada com sucesso!');
    }

    public function criaAdocaoFamilia(array $data){
        DB::table('familias')->where('id', $data['familia_id'])->update(['status' => "Em processo de adoção"]);
        return Adocaogrupo::create([
            'adotante' => $data['adotante'],
            'adotante_id' => $data['adotante_id'],
            'adotante_email' => $data['adotante_email'],
            'familia_id' => $data['familia_id'],
            'data' => $data['data'],
            'motivacao' => $data['motivacao'],
            'status' => $data['status'],
        ]);
    }

    public function cancelarSolicitacaoDeAdocaoGrupo(Request $request){
        $request->validate([
            'adocao_id' => 'required',
            'familia_id' => 'required']
        );
        $data = $request->all();

        DB::table('adocaogrupos')->where('id', $data['adocao_id'])->delete();
        DB::table('familias')->where('id', $data['familia_id'])->update(['status' => 'Esperando adoção']);

        return redirect("/dashboard")->with('message', 'Solicitação de adoção cancelada com sucesso!');
    }

    public function AdocaoBemSucedidaGrupo(Request $request){
        $request->validate([
            'depoimento' => 'required',
            'adotante_id' => 'required',
            'adocao_id' => 'required',
            'familia_id' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();
        
        DB::table('adocaogrupos')->where('id', $data['adocao_id'])->update(['status' => $data['status']]);
        DB::table('adocaogrupos')->where('id', $data['adocao_id'])->update(['depoimento' => $data['depoimento']]);

        DB::table('familias')->where('id', $data['familia_id'])->update(['status' => 'Adotada com sucesso']);
    
        return redirect("/dashboard")->with('message', 'Adoção concluída com sucesso!');
    }

    public function AdocaoMalSucedidaGrupo(Request $request){
        $request->validate([
            'depoimento' => 'required',
            'adotante_id' => 'required',
            'adocao_id' => 'required',
            'familia_id' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();
        
        DB::table('adocaogrupos')->where('id', $data['adocao_id'])->update(['status' => $data['status']]);
        DB::table('familias')->where('id', $data['familia_id'])->update(['status' => 'Esperando adoção']);
    
        return redirect("/dashboard")->with('message', 'Adoção malsucedida com sucesso!');
    }

    public function storeGrupo(Request $request){
        $request->validate([
            'adocao_id' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,jfif,svg|max:2048']
        );

        $file = $request->file('image');

        $path = Storage::disk('s3')->put('foto_familia_grupo', $file);

        Storage::disk('s3')->setVisibility($path, 'public');
        
        $data = $request->all();
        
        DB::table('adocaogrupos')->where('id', $data['adocao_id'])->update(['file_path' => Storage::disk('s3')->url($path)]);

        return redirect("/dashboard")->with('message', 'Imagem da família carregada com sucesso!');
    }

    public function entrarFila(Request $request){
        $request->validate([
            'adotante_id' => 'required',
            'crianca_sexo' => 'required',
            'crianca_idade' => 'required',
            'adotante_email' => 'required',]
        );
        $data = $request->all();
        $check = $this->criaFila($data);

        return redirect("/dashboard")->with('message', 'Você entrou na fila com sucesso!');
    }

    public function criaFila(array $data){
        return Fila::create([
            'adotante_id' => $data['adotante_id'],
            'adotante_email' => $data['adotante_email'],
            'crianca_idade' => $data['crianca_idade'],
            'crianca_sexo' => $data['crianca_sexo'],
        ]);
    }
}
