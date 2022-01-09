<?php

namespace App\Http\Controllers;

use App\Categorias;
use Illuminate\Http\Request;
use App\Projetos;
use App\Mail\email;
use App\SobreMim;
use App\Competencias;
use App\Educacao;
use App\Experiencias;
use App\DetalhesExperiencias;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use stdClass;
use Response;
use Validator;
use DateTime;

class InicioController extends Controller
{
  public function index()
  {
    // Todos os dados da model Projetos
    $projetos = DB::table('projetos as proj')
      ->join('categorias as categoria', 'categoria.id', '=', 'categoria_id')
      ->select('proj.nome', 'proj.imagem', 'proj.descricao', 'proj.link', 'categoria.nome_categoria')
      ->orderBy('categoria.nome_categoria', 'asc')
      ->get();

    $categorias = [];
    foreach ($projetos as $categoria) {
      if (!in_array($categoria->nome_categoria, $categorias)) {
        $categorias[] = $categoria->nome_categoria;
      }
    }
    if (count($projetos) > 0) {
      // Todos os dados da model SobreMim
      $sobreMim = SobreMim::findOrFail(1);
      if ($sobreMim) {
        $sobreMim->aniversario = date("d/m/Y", strtotime($sobreMim->aniversario));
        $competencias = Competencias::where('usuario_id', 1)->get();
        $educacoes = Educacao::where('usuario_id', 1)->orderBy('inicio')->get();
        $ensino = [];
        $empresas = [];
        $descricao = [];
        $experiencias = Experiencias::orderBy('inicio')->get();
        $detalhes = DetalhesExperiencias::get();

        foreach ($experiencias as $experiencia) {
          $empresas[$experiencia->id]['empresa'] = $experiencia->empresa;
          $empresas[$experiencia->id]['cidade'] = $experiencia->cidade;
          $empresas[$experiencia->id]['estado'] = $experiencia->estado;
          $empresas[$experiencia->id]['cargo'] = $experiencia->cargo;
          $inicio = strtotime($experiencia->inicio);
          $inicio = date('d/m/Y', $inicio);
          $fim = strtotime($experiencia->fim);
          $fim = date('d/m/Y', $fim);
          $empresas[$experiencia->id]['inicio'] = $inicio;
          $empresas[$experiencia->id]['fim'] = $fim;
        }
        foreach ($detalhes as $key => $detalhe) {
          $empresas[$detalhe->experiencias_id]['detalhes'][] = $detalhe->detalhes;
        }

        foreach ($educacoes as $educacao) {
          $inicio = strtotime($educacao->inicio);
          $inicio = date('Y', $inicio);
          $fim = strtotime($educacao->fim);
          $fim = date('Y', $fim);
          $educacao->inicio = $inicio;
          $educacao->fim = $fim;
          $ensino[] = $educacao;
        }

        $data = [
          'projetos' => $projetos,
          'categorias' => $categorias,
          'sobreMim' => $sobreMim,
          'competencias' => $competencias,
          'educacao' => $ensino,
          'empresas' => $empresas
        ];
        return view('welcome', compact('data'));
      }
    } else {
      return "erro ao carregar site";
    }
    // Todos os dados sobre a model Projetos
  }

  public function sendEmail(Request $request)
  {
    $nome = $request->input('name');
    $assunto = $request->input('subject');
    $remetente = $request->input('email');
    $mensagem = $request->input('message');

    $v = Validator::make($request->all(), [
      'name' => 'required',
      'subject' => 'required',
      'message' => 'required',
      'email' => 'required|email',
      'g-recaptcha-response' => 'required|recaptcha',
    ]);

    $erros = [];
    if ($v->fails()) {
      foreach ($v->errors()->messages() as $messages) {
        $erros[] = $messages;
      }
      return response($erros);
    }

    $data = [
      'name' => $nome,
      "assunto" => $assunto,
      "remetente" => $remetente,
      "mensagem" => $mensagem
    ];

    Mail::send(['text' => 'email'], $data, function ($message) {
      $message->to('flaviomartil5@gmail.com', 'Flavio Martil')->subject('Email do portfolio');
      $message->from('muxibashop@gmail.com', 'Contato Portfolio');
    });
    return response("E-mail enviado, em breve responderemos seu contato.");
  }

  public function refreshToken(Request $request)
  {
    session()->regenerate();
    return response()->json(
      [
        "token" => csrf_token()
      ],
      200
    );
  }
}
