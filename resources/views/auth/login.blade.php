@extends('layouts.main')
@section('stylesheets')
<link rel="stylesheet" href="/styles/auth/login.css">
@endsection
@section('title', 'Login - Processos Jurídicos')
@section('content')
<div class="container">
    <div class="content">
        <div class="logo">
            <img src="/logo.svg" alt="Processos Jurídicos">
        </div>
        <form action="{{ route('login') }}" method="POST" class="form">
            @csrf

            @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Digite seu e-mail">
            </div>
            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" placeholder="Digite sua senha">
            </div>

            <div class="input-group">
                <button type="submit">Entrar</button>
            </div>
            <span class="not-have">Ainda não tem uma conta? <a>Cadastre-se</a></span>
        </form>
    </div>
</div>
@endsection