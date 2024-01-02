<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessCreateRequest;
use App\Http\Requests\ProcessEditRequest;
use App\Models\Process;
use Illuminate\Http\Request;

class ProcessesController extends Controller
{
    /**
     * Função que lista todos os processos.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $lawyer = auth()->check() && auth()->user()->hasRole('lawyer');
        $judge = auth()->check() && auth()->user()->hasRole('judge');

        if ($lawyer) {
            $processes = Process::where('lawyer_id', auth()->user()->id)->orWhere('status', 'closed')->get();
        } elseif ($judge) {
            $processes = Process::where('judge_id', auth()->user()->id)->orWhere('status', 'open')->orWhere('status', 'closed')->get();
        } else {
            $processes = Process::where('status', 'closed')->get();
        }

        foreach ($processes as $process) {
            switch ($process->status) {
                case 'open':
                    $process->status = 'Aberto';
                    break;
                case 'processing':
                    $process->status = 'Em trâmite';
                    break;
                case 'closed':
                    $process->status = 'Fechado';
                    break;
            }

            switch ($process->type) {
                case 'civil':
                    $process->type = 'Cível';
                    break;
                case 'criminal':
                    $process->type = 'Criminal';
                    break;
                case 'labor':
                    $process->type = 'Trabalhista';
                    break;
                case 'family':
                    $process->type = 'Família';
                    break;
                case 'tributary':
                    $process->type = 'Tributário';
                    break;
                case 'consumer':
                    $process->type = 'Consumidor';
                    break;
                case 'administrative':
                    $process->type = 'Administrativo';
                    break;
                case 'environmental':
                    $process->type = 'Ambiental';
                    break;
                case 'intellectual_property':
                    $process->type = 'Propriedade intelectual';
                    break;
                case 'digital':
                    $process->type = 'Digital';
                    break;
                case 'other':
                    $process->type = 'Outro';
                    break;
            }
        }

        $processes = $processes->sortByDesc('created_at')->sortBy('type')->sortBy('status');

        return view('processes.dashboard', [
            'user' => $user,
            'processes' => $processes,
        ]);

    }

    /**
     * Mostra o formulário para criar um novo processo.
     */
    public function create()
    {
        return view('processes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProcessCreateRequest $request)
    {
        $process = Process::create([
            'protocol' => $request->input('protocol'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'type' => $request->input('type'),
            'status' => 'open',
            'lawyer_id' => auth()->user()->id,
        ]);

        return redirect()->route('processes.index')->with('success', 'Processo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $judge = auth()->check() && auth()->user()->hasRole('judge');

        if (!$judge) {
            return redirect()->route('login');
        }

        $process = Process::findOrFail($id);

        if ($process->status == 'open') {
            $process->status = 'processing';
            $process->judge_id = auth()->user()->id;

            $process->save();
        }

        switch ($process->status) {
            case 'open':
                $process->status = 'Aberto';
                break;
            case 'processing':
                $process->status = 'Em trâmite';
                break;
            case 'closed':
                $process->status = 'Fechado';
                break;
        }

        switch ($process->type) {
            case 'civil':
                $process->type = 'Cível';
                break;
            case 'criminal':
                $process->type = 'Criminal';
                break;
            case 'labor':
                $process->type = 'Trabalhista';
                break;
            case 'family':
                $process->type = 'Família';
                break;
            case 'tributary':
                $process->type = 'Tributário';
                break;
            case 'consumer':
                $process->type = 'Consumidor';
                break;
            case 'administrative':
                $process->type = 'Administrativo';
                break;
            case 'environmental':
                $process->type = 'Ambiental';
                break;
            case 'intellectual_property':
                $process->type = 'Propriedade intelectual';
                break;
            case 'digital':
                $process->type = 'Digital';
                break;
            case 'other':
                $process->type = 'Outro';
                break;
        }

        return view('processes.view', [
            'process' => $process,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $auth = auth()->check() && auth()->user()->hasPermissionTo('edit_process');

        if (!$auth) {
            return redirect()->route('login');
        }

        $process = Process::findOrFail($id);

        return view('processes.edit', [
            'process' => $process,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProcessEditRequest $request, string $id)
    {
        $judge = auth()->check() && auth()->user()->hasPermissionTo('finish_process');

        $data = $request->validated();

        $process = Process::findOrFail($id);

        if ($judge) {
            $data['status'] = 'closed';
        }

        $process->update($data);

        return redirect()->route('processes.index')->with('success', 'Processo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $auth = auth()->check() && auth()->user()->hasPermissionTo('delete_process');

        if (!$auth) {
            return redirect()->route('login');
        }

        $process = Process::findOrFail($id);

        $process->delete();

        return redirect()->route('processes.index')->with('success', 'Processo excluído com sucesso!');
    }

    public function finish(string $id)
    {
        $auth = auth()->check() && auth()->user()->hasPermissionTo('finish_process');

        if (!$auth) {
            return redirect()->route('login');
        }

        $process = Process::findOrFail($id);

        $process->status = 'closed';

        $process->save();

        return redirect()->route('processes.index')->with('success', 'Processo finalizado com sucesso!');
    }
}
