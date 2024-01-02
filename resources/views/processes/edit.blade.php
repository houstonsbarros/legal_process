@extends('layouts.navbar')
@section('stylesheets')
<link rel="stylesheet" href="/styles/processes/create.css">
@endsection
@section('title', 'Editar processo - Processos Jurídicos')
@section('content')
<div class="container">
    <div class="wrapper">
        <div class="header-title">
            <h2>Editar processo</h2>
            <p>Preencha os campos abaixo para editar o processo.</p>
        </div>

        <form action="{{ route('processes.update', $process->id) }}" method="POST" class="process-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="protocol">Protocolo</label>
                <input type="text" class="form-control" id="protocol" name="protocol"
                    placeholder="Digite o protocolo do processo" value="{{ $process->protocol }}">
                @error('protocol')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title"
                    placeholder="Digite o título do processo" value="{{ $process->title }}">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                    placeholder="Digite a descrição do processo">{{ $process->description }}</textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="location">Localização</label>
                <input type="text" class="form-control" id="location" name="location"
                    placeholder="Digite a localização do processo" value="{{ $process->location }}">
                @error('location')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="type">Tipo</label>
                <select class="form-control" id="type" name="type">
                    <option value="civil" {{ $process->type == 'civil' ? 'selected' : '' }}>Cível</option>
                    <option value="criminal" {{ $process->type == 'criminal' ? 'selected' : '' }}>Criminal</option>
                    <option value="labor" {{ $process->type == 'labor' ? 'selected' : '' }}>Trabalhista</option>
                    <option value="family" {{ $process->type == 'family' ? 'selected' : '' }}>Família</option>
                    <option value="tributary" {{ $process->type == 'tributary' ? 'selected' : '' }}>Tributário</option>
                    <option value="consumer" {{ $process->type == 'consumer' ? 'selected' : '' }}>Consumidor</option>
                    <option value="administrative" {{ $process->type == 'administrative' ? 'selected' : ''
                        }}>Administrativo
                    </option>
                    <option value="environmental" {{ $process->type == 'environmental' ? 'selected' : '' }}>Ambiental
                    </option>
                    <option value="digital" {{ $process->type == 'digital' ? 'selected' : '' }}>Digital</option>
                    <option value="intellectual" {{ $process->type == 'intellectual' ? 'selected' : '' }}>Propriedade
                        Intelectual</option>
                    <option value="real_estate" {{ $process->type == 'real_estate' ? 'selected' : '' }}>Imobiliário
                    </option>
                    <option value="entrepreneur" {{ $process->type == 'entrepreneur' ? 'selected' : '' }}>Empresarial
                    </option>
                    <option value="international" {{ $process->type == 'international' ? 'selected' : ''
                        }}>Internacional
                    </option>
                    <option value="other" {{ $process->type == 'other' ? 'selected' : '' }}>Outro</option>
                </select>
                @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-primary">Editar processo</button>
                <a href="/processos" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>
@endsection