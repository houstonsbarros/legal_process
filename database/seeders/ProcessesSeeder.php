<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Process;

class ProcessesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $processes = [
            [
                'protocol' => '025224214',
                'title' => 'Plágio de identidade visual',
                'description' => 'A empresa VisionTech plagiou a nossa empresa Pixel Innovations',
                'location' => 'Rio de Janeiro, RJ',
                'status' => 'open',
                'type' => 'digital',
                'lawyer_id' => 2,
            ],
            [
                'protocol' => '112056789',
                'title' => 'Quebra de contrato',
                'description' => 'A empresa Global Solutions quebrou o contrato assinado em 2023',
                'location' => 'São Paulo, SP',
                'status' => 'processing',
                'type' => 'civil',
                'lawyer_id' => 2,
                'judge_id' => 1,
            ],
            [
                'protocol' => '039875421',
                'title' => 'Assédio no ambiente de trabalho',
                'description' => 'O funcionário ConnectX relatou casos de assédio na empresa WorkHub',
                'location' => 'Belo Horizonte, MG',
                'status' => 'closed',
                'type' => 'administrative',
                'lawyer_id' => 2,
                'judge_id' => 1,
            ]
        ];

        foreach ($processes as $process) {
            Process::create($process);
        }
    }
}
