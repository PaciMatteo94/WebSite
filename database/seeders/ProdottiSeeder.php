<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdottiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Prodotti')->insert([
            [
                'categoria' => 'scheda video',
                'nome_prodotto'=>'NEX 770XT',
                'info_prodotto'=>'Scheda video con architettura Ampere, 10GB di memoria GDDR6X, velocità di clock di 1.71 GHz e supporto per il ray tracing in tempo reale.'
            ],
            [
                'categoria' => 'scheda video',
                'nome_prodotto'=>'NEX 670XT',
                'info_prodotto'=>'Scheda video di punta di AMD, 16GB di memoria GDDR6, con una velocità di clock fino a 2.25 GHz, adatta per il gaming in 4K e supporto per ray tracing.'
            ],
            [
                'categoria' => 'scheda video',
                'nome_prodotto'=>'NEX 570XT',
                'info_prodotto'=>'Scheda video di fascia media con 6GB di memoria GDDR6, ottima per il gaming in 1080p e con supporto per CUDA cores, basata su architettura Turing.'
            ],

            [
                'categoria' => 'processore',
                'nome_prodotto'=>'NEX CORE X770',
                'info_prodotto'=>'Processore NEX di settima generazione con 8 core e 16 thread, velocità di clock fino a 5.3 GHz, supporto PCIe 4.0 e NEX UHD Graphics 1550 integrata.'
            ],
            [
                'categoria' => 'processore',
                'nome_prodotto'=>'NEX CORE X760',
                'info_prodotto'=>'Processore NEX di settima generazione con 6 core e 12 thread, velocità di clock fino a 4,8 GHz, supporto PCIe 4.0'
            ],
            [
                'categoria' => 'scheda video',
                'nome_prodotto'=>'NEX CORE X750',
                'info_prodotto'=>'Processore NEX di settima generazione con 4 core e 8 thread, velocità di clock fino a 4.5 GHz, supporto PCIe 4.0'
            ],
            [
                'categoria' => 'scheda madre',
                'nome_prodotto'=>'NEX MAG TOMAWAHK X350',
                'info_prodotto'=>'Scheda madre ATX per processori NEX  di settima generazione, supporto PCIe 4.0, connettività Wi-Fi 6, 14+2 fasi di alimentazione e illuminazione RGB.'
            ],
            [
                'categoria' => 'scheda madre',
                'nome_prodotto'=>'NEX STRIX X390',
                'info_prodotto'=>'Scheda madre ATX per processori NEX di settima generazione con supporto PCIe 4.0, dissipazione avanzata e connettività Ethernet da 2.5Gbps.'
            ],
            [
                'categoria' => 'scheda madre',
                'nome_prodotto'=>'NEX ELITE X400',
                'info_prodotto'=>'Scheda madre per processori NEX di settima generazione, supporto per PCIe 4.0, 12+2 fasi di alimentazione e dissipazione passiva del chipset.'
            ]

        ]);
    }
}
