<x-login.header title="NOVA SENHA ">
    
    <div class="login-container ">
        <div class="text-center">
            <h3 class="mb-4">{{ env('APP_NAME') }} Nº 3551</h3>
            <div class="logo">
                <img src="{{asset('storage/images/logo-circles.png')}}" alt="Logo {{ env('APP_NAME') }}">
            </div>

            <h3 class="mb-4">Insira a nova senha</h3>
        </div>

        <form method="POST" action="{{route('login.trocarSenha', $token)}}">
            @csrf
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Nova Senha" value="">
                <label for="password">Informe a nova Senha</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="passwordConfirma" name="passwordConfirma" placeholder="Confirme a nova Senha" value="">
                <label for="passwordConfirma">Confirme a nova Senha</label>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger mt-3" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success mt-3" role="alert">
                    {!!session('success')!!}
                </div>
            @endif
            
            <button type="submit" class="btn btn-dark w-100">Alterar senha</button>

            <div class="text-center mt-3">
                <a href="{{route('login.login')}}">Fazer login</a>
            </div>
        </form>
    </div>

</x-login.header>
