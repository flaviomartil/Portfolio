<?php

namespace App\Http\Controllers;

use App\categorias;
use Illuminate\Http\Request;
use App\projeto;
use App\projetos;
use App\Mail\email;
use App\sobreMim;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use stdClass;
use Response;

class InicioController extends Controller
{
  public function index()
  {
    // Todos os dados da model Projetos
    $projetos = DB::table('projetos')
      ->join('categorias', 'categoria_id', '=', 'categorias.id')
      ->select('nome', 'nome_categoria', 'imagem', 'descricao', 'link')
      ->get('');
    $categorias = categorias::get();
    // Todos os dados da model categorias
    $contador = 0;

    if (count($categorias) > 0) {
      // Todos os dados da model sobreMim
      $model = sobreMim::find(1);
      if ($model) {
        $orgDate = $model->aniversario;
        $newDate = date("d/m/Y", strtotime($orgDate));
        return view('welcome', compact('model', 'newDate', 'categorias', 'projetos', 'contador'));
      }
    } else {
      return "erro ao carregar site";
    }
    // Todos os dados sobre a model Projetos
  }

  public function sendEmail(Request $request)
  {
    // try {
    $nome = $request->input('name');
    $assunto = $request->input('subject');
    $remetente = $request->input('email');
    $mensagem = $request->input('message');

    $this->validate($request, [
      'name' => 'required',
      'subject' => 'required',
      'message' => 'required',
      'email' => 'required|email',
      'g-recaptcha-response' => 'required|recaptcha',
    ]);

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
    // } catch (\Exception $e) {
    //   return response("Ocorreu um erro ao validar os campos, tente novamente mais tarde.");
    // }
  }
}
