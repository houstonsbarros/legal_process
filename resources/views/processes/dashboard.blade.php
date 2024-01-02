@extends('layouts.navbar')
@section('stylesheets')
<link rel="stylesheet" href="/styles/processes/dashboard.css">
@endsection
@section('title', 'Início - Processos Jurídicos')
@section('content')
<div class="container">
    <div class="wrapper">
        @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="container-title">
            <div class="header-title">
                <h2>Processos</h2>
                <p>Veja abaixo todos os processos cadastrados.</p>
            </div>
            @if (auth()->user()->hasRole('lawyer'))
            <a href="{{route('processes.create')}}"> Criar novo processo</a>
            @endif
        </div>
        <div class="container-processes">
            @if (count($processes) == 0)
            <div class="empty">
                <h3>Nenhum processo cadastrado</h3>
                <p>Por favor, crie um novo processo.</p>
            </div>
            @endif

            @foreach ($processes as $process)
            <div class="process">
                <h3 class="process-number">{{ $process->protocol }}</h3>

                <h3 class="process-title">{{ $process->title }}</h3>

                <p class="process-description">{{ $process->description }}</p>

                <div class="footer-process">
                    <div class="location">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                            height="200px" width="200px" xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                            <path
                                d="M13.02 19.93v2.02c2.01-.2 3.84-1 5.32-2.21l-1.42-1.43a7.941 7.941 0 01-3.9 1.62zM4.03 12c0-4.05 3.03-7.41 6.95-7.93V2.05C5.95 2.58 2.03 6.84 2.03 12c0 5.16 3.92 9.42 8.95 9.95v-2.02c-3.92-.52-6.95-3.88-6.95-7.93zM19.95 11h2.02c-.2-2.01-1-3.84-2.21-5.32l-1.43 1.43c.86 1.1 1.44 2.43 1.62 3.89zM18.34 4.26a9.981 9.981 0 00-5.32-2.21v2.02c1.46.18 2.79.76 3.9 1.62l1.42-1.43zM18.33 16.9l1.43 1.42A9.949 9.949 0 0021.97 13h-2.02a7.941 7.941 0 01-1.62 3.9z">
                            </path>
                            <path
                                d="M16 11.1C16 8.61 14.1 7 12 7s-4 1.61-4 4.1c0 1.66 1.33 3.63 4 5.9 2.67-2.27 4-4.24 4-5.9zm-4 .9a1.071 1.071 0 010-2.14A1.071 1.071 0 0112 12z">
                            </path>
                        </svg>
                        <p class="process-location">{{ $process->location }}</p>
                    </div>

                    <div class="type">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                            id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512"
                            style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g>
                                <g>
                                    <path
                                        d="M501.801,188.468h-6.835c-6.659-33.785-40.813-93.27-55.933-118.465c7.089-4.876,11.749-13.041,11.749-22.276    c0-14.9-12.123-27.023-27.023-27.023s-27.022,12.122-27.022,27.023c0,9.235,4.66,17.4,11.75,22.276    c-15.119,25.195-49.273,84.68-55.932,118.465h-6.834c-5.632,0-10.199,4.566-10.199,10.199c0,48.655,39.584,88.239,88.239,88.239    c48.655,0,88.239-39.584,88.239-88.239C512,193.034,507.433,188.468,501.801,188.468z M423.76,41.103    c3.652,0,6.624,2.972,6.624,6.624s-2.972,6.623-6.624,6.623s-6.623-2.971-6.623-6.623S420.107,41.103,423.76,41.103z     M423.744,84.203c17.259,29.132,43.912,77.658,50.468,104.265H373.34C379.529,163.556,403.51,118.209,423.744,84.203z     M423.76,266.508c-33.941,0-62.142-25.055-67.076-57.642h134.153C485.902,241.453,457.703,266.508,423.76,266.508z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M346.782,432.674h-26.964v-25.902c0-5.633-4.567-10.199-10.199-10.199h-25.902V111.67    c6.671-6.594,10.968-15.585,11.466-25.562l43.126-9.28c5.507-1.185,9.011-6.61,7.826-12.117    c-1.186-5.507-6.611-9.007-12.117-7.825l-43.227,9.303c-6.485-12.312-19.405-20.731-34.261-20.731    c-20.573,0-37.441,16.136-38.628,36.416l-107.84,23.206c-4.92-6.729-12.867-11.111-21.822-11.111    c-14.9,0-27.023,12.122-27.023,27.023c0,9.235,4.66,17.401,11.75,22.276c-15.12,25.195-49.273,84.68-55.932,118.465h-6.834    C4.566,261.733,0,266.299,0,271.932c0,48.655,39.584,88.239,88.239,88.239c48.655,0,88.239-39.584,88.239-88.239    c0-5.633-4.566-10.199-10.199-10.199h-6.834c-6.659-33.786-40.813-93.27-55.932-118.465c6.074-4.177,10.36-10.768,11.465-18.379    l107.141-23.055c1.885,3.654,4.328,6.974,7.225,9.838v284.904h-25.901c-5.633,0-10.199,4.566-10.199,10.199v25.902H166.28    c-5.633,0-10.199,4.566-10.199,10.199v38.221c0,5.633,4.566,10.199,10.199,10.199h180.502c5.632,0,10.199-4.566,10.199-10.199    v-38.224C356.981,437.24,352.414,432.674,346.782,432.674z M88.239,114.366c3.652,0,6.624,2.972,6.624,6.624    s-2.972,6.623-6.624,6.623s-6.624-2.971-6.624-6.623S84.587,114.366,88.239,114.366z M88.239,339.771    c-33.942,0-62.142-25.055-67.076-57.642h134.152C150.381,314.716,122.181,339.771,88.239,339.771z M138.691,261.731H37.819    c6.19-24.912,30.171-70.259,50.405-104.265C105.482,186.597,132.135,235.123,138.691,261.731z M256.531,65.854    c10.093,0,18.303,8.21,18.303,18.303s-8.211,18.303-18.303,18.303s-18.303-8.21-18.303-18.303S246.438,65.854,256.531,65.854z     M263.32,122.252v274.322h-13.578V122.251c2.206,0.393,4.472,0.609,6.79,0.609S261.114,122.643,263.32,122.252z M213.641,416.971    h85.779v15.703h-85.779V416.971z M336.583,470.897H176.479v-17.825h160.104V470.897z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M385.42,56.888c-1.185-5.507-6.611-9.01-12.118-7.825l-7.432,1.599c-5.506,1.185-9.01,6.61-7.825,12.117    c1.031,4.784,5.259,8.055,9.962,8.055c0.711,0,1.433-0.074,2.156-0.23l7.432-1.599C383.1,67.82,386.605,62.395,385.42,56.888z" />
                                </g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                        </svg>
                        <p class="process-type">{{ $process->type }}</p>
                    </div>
                </div>

                <p class="process-status">{{ $process->status }}</p>

                @if (auth()->user()->hasRole('lawyer') && $process->status =='Aberto' ||
                auth()->user()->hasRole('judge'))
                <div class="process-actions">
                    @if (auth()->user()->hasRole('judge'))
                    <a href="{{ route('processes.show', $process->id) }}">Visualizar</a>
                    @endif

                    @if (auth()->user()->hasRole('lawyer') && $process->status == 'Aberto')
                    <a href="{{ route('processes.edit', $process->id) }}">Editar</a>
                    @endif

                    @if (auth()->user()->hasRole('lawyer') && $process->status == 'Aberto')
                    <form method="POST" action="{{ route('processes.destroy', $process->id) }}" class="delete-table">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                    @endif
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection