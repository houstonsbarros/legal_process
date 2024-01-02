@extends('layouts.navbar')
@section('stylesheets')
<link rel="stylesheet" href="/styles/processes/details.css">
@endsection
@section('title', 'Visualizar processo - Processos Jurídicos')
@section('content')
<div class="container">
    <div class="wrapper">
        <div class="process-details-header">
            <p class="process-title">{{ $process->title }}</p>
            <p class="process-subtitle">{{ $process->protocol }}</p>
        </div>

        <div class="process-details-body">
            <div class="process-details-body-left">
                <div class="process-details-body-left-item">
                    <p class="process-details-body-left-item-title">Descrição</p>
                    <p class="process-details-body-left-item-text">{{ $process->description }}</p>
                </div>

                <div class="process-details-body-left-item">
                    <p class="process-details-body-left-item-title">Localização</p>
                    <p class="process-details-body-left-item-text">{{ $process->location }}</p>
                </div>

                <div class="process-details-body-left-item">
                    <p class="process-details-body-left-item-title">Tipo</p>
                    <p class="process-details-body-left-item-text">{{ $process->type }}</p>
                </div>

                <div class="process-details-body-left-item">
                    <p class="process-details-body-left-item-title">Status</p>
                    <p class="process-details-body-left-item-text">{{ $process->status }}</p>
                </div>
            </div>

            <div class="process-details-body-right">
                <div class="process-details-body-right-item">
                    <p class="process-details-body-right-item-title">Criado em</p>
                    <p class="process-details-body-right-item-text">{{$process->created_at->format('d/m/Y') }} às {{
                        $process->created_at->format('H:i')}}</p>
                </div>

                <div class="process-details-body-right-item">
                    <p class="process-details-body-right-item-title">Atualizado em</p>
                    <p class="process-details-body-right-item-text">{{ $process->updated_at->format('d/m/Y') }} às
                        {{ $process->updated_at->format('H:i')}}
                    </p>
                </div>
            </div>
        </div>

        <div class="process-details-footer">
            @if ($process->status == 'Em trâmite')
            <a href="{{ route('processes.finish', $process->id) }}" class="process-details-edit-button">Finalizar</a>
            @endif
            <a href="{{ route('processes.index') }}" class="process-details-back-button">Voltar</a>
        </div>
    </div>
</div>
@endsection