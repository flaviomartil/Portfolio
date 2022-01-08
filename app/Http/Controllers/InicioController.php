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
        $educacoes = Educacao::where('usuario_id', 1)->get();

        $experiencias = DB::table('detalhes_experiencias as detalhes')
          ->join('experiencias as xp', 'detalhes.experiencias_id', '=', 'xp.id')
          ->select('detalhes.detalhes', 'xp.empresa', 'xp.cargo', 'xp.inicio', 'xp.fim', 'xp.cidade', 'xp.estado')
          ->get();
        $ensino = [];
        foreach ($educacoes as $educacao) {
          $ensino = $educacao;
        }
        $empresas = [];
        foreach ($experiencias as $experiencia) {
          if (!isset($empresas[$experiencia->empresa]['inicio']) || !isset($empresas[$experiencia->empresa]['fim']) || !isset($empresas[$experiencia->empresa]['cargo'])) {
            $empresas[$experiencia->empresa]['inicio'] = $experiencia->inicio;
            $empresas[$experiencia->empresa]['fim'] = $experiencia->fim;
            $empresas[$experiencia->empresa]['cargo'] = $experiencia->cargo;
            $empresas[$experiencia->empresa]['cidade'] = $experiencia->cidade;
            $empresas[$experiencia->empresa]['estado'] = $experiencia->estado;
          }
          $empresas[$experiencia->empresa]['detalhes'][] = $experiencia->detalhes;
        }
        $data = [
          'projetos' => $projetos,
          'categorias' => $categorias,
          'sobreMim' => $sobreMim,
          'competencias' => $competencias,
          'educacao' => $educacao,
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
