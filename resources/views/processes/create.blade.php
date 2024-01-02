@extends('layouts.navbar')
@section('stylesheets')
<link rel="stylesheet" href="/styles/processes/create.css">
@endsection
@section('title', 'Criar novo processo - Processos Jurídicos')
@section('content')
<div class="container">
    <div class="wrapper">
        <div class="header-title">
            <h2>Criar novo processo</h2>
            <p>Preencha os campos abaixo para criar um novo processo.</p>
        </div>

        <form action="{{ route('processes.store') }}" method="POST" class="process-form">
            @csrf

            <div class="form-group">
                <label for="protocol">Protocolo</label>
                <input type="text" class="form-control" id="protocol" name="protocol"
                    placeholder="Digite o protocolo do processo" value="{{ old('protocol') }}">
                @error('protocol')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title"
                    placeholder="Digite o título do processo" value="{{ old('title') }}">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                    placeholder="Digite a descrição do processo">{{ old('description') }}</textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="location">Localização</label>
                <input type="text" class="form-control" id="location" name="location"
                    placeholder="Digite a localização do processo" value="{{ old('location') }}">
                @error('location')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="type">Tipo</label>
                <select class="form-control" id="type" name="type">
                    <option value="civil">Cível</option>
                    <option value="criminal">Criminal</option>
                    <option value="labor">Trabalhista</option>
                    <option value="family">Família</option>
                    <option value="tributary">Tributário</option>
                    <option value="consumer">Consumidor</option>
                    <option value="administrative">Administrativo
                    </option>
                    <option value="environmental">Ambiental
                    </option>
                    <option value="intellectual_property">Propriedade intelectual</option>
                    <option value="digital">Digital</option>
                    <option value="other">Outro</option>
                </select>
                @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-primary">Criar processo</button>
                <a href="/processos" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>
</div>
@endsection