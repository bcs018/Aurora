@component('mail::message')

<h2>Solicitação de alteração de senha</h2>

<p>Para trocar sua senha clique no botão abaixo.</p>

<br>
@component('mail::button', ['url' => route($route, $token)])
    Trocar senha
@endcomponent

@endcomponent