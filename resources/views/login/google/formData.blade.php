@extends('layouts.siteLogin')
@section('title', 'Definir Data')
@section('content')
    <main class="container">
        <h3>Digite sua data de nascimento.</h3>
        <form method="POST" action="{{URL('/formDataNascimento')}}">
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="input-field">
                <input type="date" name="data" id="data"
                    required>
            </div>
            <div class="input-field"><input type="submit" value="Enviar"></div>
        </form>
        <a href="{{route("login.index")}}">Voltar ao login</a>
        </div>
    </main>
@endsection