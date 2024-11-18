<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\TrocarSenha;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function store(LoginRequest $request)
    {
        if (Auth::attempt($request->only('cim', 'password')))
            return to_route('home.indexPage');
        else 
            return to_route('login.login')->withErrors('Usuário e/ou senha inválidos')->withInput();
    }

    public function destroy()
    {
        Auth::logout();

        return to_route('login.login');
    }

    public function solicitarTrocarSenha()
    {
        return view('login.trocarSenha');
    }

    public function solicitarTrocaSenha(Request $request)
    {
        $request->validate(
            ['cim' => 'required'],
            ['cim.required' => "O campo CIM é obrigatório"]
        );

        $usuario = User::where('cim', $request->cim)->first();

        if (!$usuario)
        {
            return to_route('login.solicitarTrocaSenhaPost')->withErrors('Usuário não encontrado');
        }

        $tokenGerado = md5(rand(1, 99999).$request->cim.time());

        $token = new Token();
        $token->login = $request->cim;
        $token->token = $tokenGerado;
        $token->data = date('Y-m-d');
        $token->hora = date('H:i:s');
        $token->ativo = true;
        $token->save();

        $email = new TrocarSenha('login.novaSenha', $tokenGerado);

        $email->subject("Solicitação de alteração de senha - ".env('APP_NAME'));
        
        $email->from(env('EMAIL_EMPRESA'));
    
        $mail = new Mail();
        $mail::to($usuario->email)->send($email);
        
        return redirect()->back()->with(
            'success', 
            'Enviamos para o  e-mail <b>'.$usuario->email.'</b> um link para a alteração de senha, este link é válido por 30 minutos.<br>'
        );
    }

    public function novaSenha($hash)
    {
        $token = Token::where('token', $hash)->where('ativo', 1)->first();

        if(!$token)
        {
            return to_route('login.login')->withErrors('Token não encontrado ou expirado, faça uma nova solicitação de alteração de senha');
        }

        // Data e hora fornecida sem hifens
        $dataHora =  $token->data . ' ' . $token->hora;

        // Converte a data e hora fornecida para timestamp
        $timestampFornecido = strtotime($dataHora);

        // Obtém o timestamp atual
        $timestampAtual = time();

        // Calcula a diferença em segundos
        $diferencaSegundos = $timestampAtual - $timestampFornecido;

        // Verifica se a diferença é maior ou igual a 1800 segundos (30 minutos)
        if ($diferencaSegundos >= 1800) 
        {
            $token->ativo = 0;
            $token->save();

            return to_route('login.login')->withErrors('Token expirado, faça uma nova solicitação de alteração de senha');
        }

        return view('login.novaSenha', ['token' => $hash]);
    }

    public function trocarSenha(Request $request, $hash)
    {
        $request->validate(
            [
                'password'         => 'required|min:5',
                'passwordConfirma' => 'required|min:5',
            ],
            [
                'password.required'         => 'O campo Nova senha é obrigatório',
                'passwordConfirma.required' => 'O campo Confirme a nova senha é obrigatório',
                'password.min'              => 'O campo Nova senha precisa de pelo menos :min caracteres',
                'passwordConfirma.min'      => 'O campo Confirme nova senha precisa de pelo menos :min caracteres'
            ]
        );

        if ($request->password != $request->passwordConfirma)
            return to_route('login.novaSenha', $hash)->withErrors('As senhas não correspondem.');

        $token = Token::where('token', $hash)->where('ativo', 1)->first();

        if ($token == null)
            return to_route('login.novaSenha', $hash)->withErrors('Token não encontrado.');
    
        $usuario = User::where('cim', $token->login)->first();
        $usuario->password = Hash::make($request->password);
        $usuario->save();
    
        $token->ativo = 0;
        $token->save();
    
        return to_route('login.login')->with('success', 'Senha alterada com sucesso, faça login para continuar!');
    }
}
