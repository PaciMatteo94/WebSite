<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'name' => 'NEX HydroXtreme 360',
                'info' => 'Il sistema di raffreddamento a liquido HydroXtreme 360 è progettato per gli appassionati di overclocking. Con un radiatore da 360 mm e tre ventole ad alta efficienza, garantisce una dissipazione del calore eccezionale e un funzionamento silenzioso anche sotto carico massimo. Perfetto per mantenere le tue CPU NEX CoreX ai livelli ottimali di temperatura.',
                'image' => 'images/Cooling/NEX HydroXtreme 360.png',
                'thumbnail' => 'images/Cooling/Thumbnails/NEX HydroXtreme 360(mini).png',

            ],
            [
                'category_id' => 1,
                'name' => 'NEX AcquaForce Pro',
                'info' => 'Il NEX AcquaForce Pro offre raffreddamento a liquido di qualità premium con un radiatore da 240 mm, compatto e versatile. Grazie alle ventole PWM e a un flusso d\'acqua ottimizzato, assicura una gestione termica eccellente per i sistemi di fascia alta e i PC da gaming. Ideale per le CPU NEX CoreX7.',
                'image' => 'images/Cooling/NEX AcquaForce Pro.png',
                'thumbnail' => 'images/Cooling/Thumbnails/NEX AcquaForce Pro(mini).png',

            ],
            [
                'category_id' => 1,
                'name' => 'NEX AirBlade 120',
                'info' => 'Il NEX AirBlade 120 è un sistema di raffreddamento ad aria performante con doppia ventola da 120 mm e un dissipatore in alluminio ottimizzato per garantire la massima dissipazione del calore. Facile da installare, è una soluzione affidabile per mantenere freschi i processori NEX CoreX5.',
                'image' => 'images/Cooling/NEX AirBlade 120.png',
                'thumbnail' => 'images/Cooling/Thumbnails/NEX AirBlade 120(mini).png',

            ],
            [
                'category_id' => 1,
                'name' => 'NEX FrostCore 150',
                'info' => 'Il FrostCore 150 è pensato per coloro che cercano un sistema di raffreddamento ad aria potente e silenzioso. Dotato di una ventola da 150 mm con pale avanzate e un dissipatore multi-tubo, offre prestazioni termiche eccellenti anche sotto carico pesante. Perfetto per le CPU NEX CoreX7.',
                'image' => 'images/Cooling/NEX FrostCore 150.png',
                'thumbnail' => 'images/Cooling/Thumbnails/NEX FrostCore 150(mini).png',

            ],
            [
                'category_id' => 8,
                'name' => 'NEX VisionEdge 24',
                'info' => 'Il VisionEdge 24 è un monitor da 24 pollici con risoluzione Full HD, perfetto per il gaming e il lavoro quotidiano. Con una frequenza di aggiornamento di 144Hz e tecnologia FreeSync, garantisce immagini fluide e senza tearing. La scelta ideale per i giocatori competitivi.',
                'image' => 'images/Monitor/NEX VisionEdge 24.png',
                'thumbnail' => 'images/Monitor/Thumbnails/NEX VisionEdge 24(mini).png',

            ],
            [
                'category_id' => 8,
                'name' => 'NEX UltraView 32',
                'info' => 'Il monitor UltraView 32 offre un display da 32 pollici 4K UHD, pensato per la produttività e la creatività. La sua alta risoluzione e l’accuratezza del colore lo rendono perfetto per i designer e i professionisti. Dotato di supporto HDR e cornice ultrasottile.',
                'image' => 'images/Monitor/NEX UltraView 32.png',
                'thumbnail' => 'images/Monitor/Thumbnails/NEX UltraView 32(mini).png',

            ],
            [
                'category_id' => 8,
                'name' => 'NEX QuantumPro 27',
                'info' => 'Il QuantumPro 27 combina un pannello QHD (2560x1440) con tecnologia Quantum Dot per colori vividi e dettagli precisi. Con una frequenza di aggiornamento di 165Hz, è perfetto per chi cerca il massimo della fluidità nelle sessioni di gaming.',
                'image' => 'images/Monitor/NEX QuantumPro 27.png',
                'thumbnail' => 'images/Monitor/Thumbnails/NEX QuantumPro 27(mini).png',


            ],
            [
                'category_id' => 8,
                'name' => 'NEX CrystalWave 29',
                'info' => 'Il CrystalWave 29 è un monitor ultrawide da 29 pollici con risoluzione WQHD (3440x1440), progettato per il multitasking e l\'intrattenimento. Grazie al suo design curvo, avvolge lo spettatore, offrendo un’esperienza visiva immersiva.',
                'image' => 'images/Monitor/NEX CrystalWave 29.png',
                'thumbnail' => 'images/Monitor/Thumbnails/NEX CrystalWave 29(mini).png',

            ],
            [
                'category_id' => 9,
                'name' => 'NEX AeroSpin 120 White',
                'info' => 'La AeroSpin 120 è una ventola ad alte prestazioni con tecnologia PWM per un controllo dinamico della velocità. Progettata per garantire un flusso d\'aria potente e silenzioso, è perfetta per mantenere freschi i case dei PC da gaming.',
                'image' => 'images/Fan/NEX AeroSpin 120 White.png',
                'thumbnail' => 'images/Fan/Thumbnails/NEX AeroSpin 120 White(mini).png',

            ],
            [
                'category_id' => 9,
                'name' => 'NEX AeroSpin 120 Black',
                'info' => 'La AeroSpin 120 è una ventola ad alte prestazioni con tecnologia PWM per un controllo dinamico della velocità. Progettata per garantire un flusso d\'aria potente e silenzioso, è perfetta per mantenere freschi i case dei PC da gaming.',
                'image' => 'images/Fan/NEX AeroSpin 120 Black.png',
                'thumbnail' => 'images/Fan/Thumbnails/NEX AeroSpin 120 Black(mini).png',

            ],
            [
                'category_id' => 9,
                'name' => 'NEX HyperWind 140 White',
                'info' => 'La HyperWind 140 è una ventola ottimizzata per i sistemi di raffreddamento ad aria, garantendo alta pressione e flusso costante. Ideale per PC da gaming e workstation che richiedono raffreddamento avanzato.',
                'image' => 'images/Fan/NEX HyperWind 140 White.png',
                'thumbnail' => 'images/Fan/Thumbnails/NEX HyperWind 140 White(mini).png',

            ],
            [
                'category_id' => 9,
                'name' => 'NEX HyperWind 140 Black',
                'info' => 'La HyperWind 140 è una ventola ottimizzata per i sistemi di raffreddamento ad aria, garantendo alta pressione e flusso costante. Ideale per PC da gaming e workstation che richiedono raffreddamento avanzato.',
                'image' => 'images/Fan/NEX HyperWind 140 Black.png',
                'thumbnail' => 'images/Fan/Thumbnails/NEX HyperWind 140 Black(mini).png',

            ],
            [
                'category_id' => 2,
                'name' => 'NEX CoreX5',
                'info' => 'Il NEX CoreX5 è un processore a 6 core ad alte prestazioni, progettato per PC da gaming e workstation di fascia media. Con un\'elevata frequenza di clock e supporto multi-threading, è perfetto per i giocatori e creatori di contenuti.',
                'image' => 'images/Cpu/NEX CoreX5.png',
                'thumbnail' => 'images/Cpu/Thumbnails/NEX CoreX5(mini).png',

            ],
            [
                'category_id' => 2,
                'name' => 'NEX CoreX7',
                'info' => 'Potenza ed efficienza si uniscono nel CoreX7, un processore a 8 core per utenti esigenti. Ideale per editing video, rendering 3D e gaming di alto livello, con tecnologia avanzata di gestione energetica per mantenere le temperature sotto controllo.',
                'image' => 'images/Cpu/NEX CoreX7.png',
                'thumbnail' => 'images/Cpu/Thumbnails/NEX CoreX7(mini).png',

            ],
            [
                'category_id' => 2,
                'name' => 'NEX CoreX9',
                'info' => 'Il top di gamma CoreX9 offre 12 core e 24 thread, pensato per le workstation professionali e i PC da gaming estremi. Ideale per le applicazioni più pesanti, come machine learning e simulazioni complesse.',
                'image' => 'images/Cpu/NEX CoreX9.png',
                'thumbnail' => 'images/Cpu/Thumbnails/NEX CoreX9(mini).png',

            ],
            [
                'category_id' => 4,
                'name' => 'NEX HyperMemory 16GB DDR5',
                'info' => 'La HyperMemory 16GB DDR5 è progettata per offrire velocità elevate e affidabilità per le build più esigenti. Con una frequenza di 5200 MHz, questa RAM fornisce prestazioni eccellenti per il gaming, il multitasking e le applicazioni professionali. Ideale per utenti che cercano stabilità e potenza nelle loro configurazioni NEX.',
                'image' => 'images/RAM/NEX HyperMemory 16GB DDR5.png',
                'thumbnail' => 'images/RAM/Thumbnails/NEX HyperMemory 16GB DDR5(mini).png',

            ],
            [
                'category_id' => 4,
                'name' => 'NEX VelocityRAM 32GB DDR5',
                'info' => 'La VelocityRAM 32GB DDR5 combina alta capacità con frequenze ultraveloci di 6000 MHz, ideale per carichi di lavoro intensivi come rendering, editing video e gaming di alto livello. Progettata per sistemi avanzati, questa RAM garantisce fluidità anche nelle operazioni più complesse, offrendo affidabilità estrema per i professionisti e gli appassionati di performance.',
                'image' => 'images/RAM/NEX VelocityRAM 32GB DDR5.png',
                'thumbnail' => 'images/RAM/Thumbnails/NEX VelocityRAM 32GB DDR5(mini).png',

            ],
            [
                'category_id' => 7,
                'name' => 'NEX TitanDrive 2TB',
                'info' => 'Il TitanDrive 2TB è un disco rigido affidabile e veloce, ideale per archiviazione di massa e backup. Con una velocità di rotazione di 7200 RPM, offre tempi di accesso rapidi e grande capacità.',
                'image' => 'images/Storage/NEX TitanDrive 2TB.png',
                'thumbnail' => 'images/Storage/Thumbnails/NEX TitanDrive 2TB(mini).png',

            ],
            [
                'category_id' => 7,
                'name' => 'NEX VaultPro 2TB',
                'info' => 'Il VaultPro 2TB è un HDD ad alte prestazioni con capacità di archiviazione extra-large. Perfetto per i creatori di contenuti che hanno bisogno di spazio e affidabilità per i loro file multimediali di grandi dimensioni.',
                'image' => 'images/Storage/NEX VaultPro 2TB.png',
                'thumbnail' => 'images/Storage/Thumbnails/NEX VaultPro 2TB(mini).png',

            ],
            [
                'category_id' => 7,
                'name' => 'NEX FlashStrike 980',
                'info' => 'L\'SSD FlashStrike 980 offre velocità straordinarie fino a 3500 MB/s, ideale per chi desidera avvii rapidi e trasferimenti dati fulminei. Perfetto per i sistemi di fascia alta.',
                'image' => 'images/Storage/NEX FlashStrike 980.png',
                'thumbnail' => 'images/Storage/Thumbnails/NEX FlashStrike 980(mini).png',

            ],
            [
                'category_id' => 7,
                'name' => 'NEX SpeedForce 990',
                'info' => 'Il SpeedForce 990 combina prestazioni e capacità, con velocità fino a 5000 MB/s. Ideale per i professionisti che cercano il massimo delle prestazioni per carichi di lavoro intensi.',
                'image' => 'images/Storage/NEX SpeedForce 990.png',
                'thumbnail' => 'images/Storage/Thumbnails/NEX SpeedForce 990(mini).png',

            ],
            [
                'category_id' => 7,
                'name' => 'NEX NitroBoost 990',
                'info' => 'Il NitroBoost 990 è un SSD M.2 NVMe di punta, con velocità ultra rapide fino a 7000 MB/s. Progettato per chi necessita di prestazioni superiori nei gaming e nei carichi di lavoro professionali.',
                'image' => 'images/Storage/NEX NitroBoost 990.png',
                'thumbnail' => 'images/Storage/Thumbnails/NEX NitroBoost 990(mini).png',

            ],
            [
                'category_id' => 6,
                'name' => 'NEX VeloCore 3080',
                'info' => 'La VeloCore 3080 è una GPU ad alte prestazioni progettata per il gaming 4K e il rendering in tempo reale. Con un’architettura avanzata e una memoria dedicata da 10GB GDDR6X, offre fluidità e dettagli incredibili.',
                'image' => 'images/Gpu/NEX VeloCore 3080.png',
                'thumbnail' => 'images/Gpu/Thumbnails/NEX VeloCore 3080(mini).png',

            ],
            [
                'category_id' => 6,
                'name' => 'NEX GraphiteX 4070',
                'info' => 'La GraphiteX 4070 è la soluzione ideale per i giocatori esigenti e i creativi digitali. Con 12GB di memoria GDDR6, supporta il ray tracing in tempo reale e il rendering di contenuti grafici complessi.',
                'image' => 'images/Gpu/NEX GraphiteX 4070.png',
                'thumbnail' => 'images/Gpu/Thumbnails/NEX GraphiteX 4070(mini).png',

            ],
            [
                'category_id' => 6,
                'name' => 'NEX Xcelerate 5090',
                'info' => 'Il top di gamma Xcelerate 5090 offre prestazioni di livello professionale con 16GB di memoria GDDR6X. Progettata per il gaming 8K e la creazione di contenuti VR, è la scelta definitiva per chi desidera potenza estrema.',
                'image' => 'images/Gpu/NEX Xcelerate 5090.png',
                'thumbnail' => 'images/Gpu/Thumbnails/NEX Xcelerate 5090(mini).png',

            ],
            [
                'category_id' => 3,
                'name' => 'NEX PowerBoard Z790',
                'info' => 'La PowerBoard Z790 è una scheda madre di fascia alta progettata per le CPU NEX CoreX9. Supporta PCIe 5.0, DDR5, e offre connettività Wi-Fi 6E, rendendola perfetta per gaming e workstation professionali.',
                'image' => 'images/MoBo/NEX PowerBoard Z790.png',
                'thumbnail' => 'images/MoBo/Thumbnails/NEX PowerBoard Z790(mini).png',

            ],
            [
                'category_id' => 3,
                'name' => 'NEX HyperBoard X570',
                'info' => 'La HyperBoard X570 è ideale per le CPU NEX CoreX7, con supporto per PCIe 4.0 e slot M.2 NVMe per SSD ultra-rapidi. Perfetta per gaming di alto livello e lavori di produttività intensiva.',
                'image' => 'images/MoBo/NEX HyperBoard X570.png',
                'thumbnail' => 'images/MoBo/Thumbnails/NEX HyperBoard X570(mini).png',

            ],
            [
                'category_id' => 3,
                'name' => 'NEX ForceBoard B550',
                'info' => 'La ForceBoard B550 è una scheda madre versatile, compatibile con le CPU NEX CoreX5. Offre performance stabili e connettività affidabile, ideale per configurazioni di fascia media.',
                'image' => 'images/MoBo/NEX ForceBoard B550.png',
                'thumbnail' => 'images/MoBo/Thumbnails/NEX ForceBoard B550(mini).png',

            ],
            [
                'category_id' => 5,
                'name' => 'NEX EnergyPro 750W',
                'info' => 'L\'EnergyPro 750W è perfetto per build di fascia media, con efficienza certificata 80 PLUS Bronze. Garantisce potenza stabile e protezione contro sovratensioni per sistemi gaming e produttivi.',
                'image' => 'images/Psu/NEX EnergyPro 750W.png',
                'thumbnail' => 'images/Psu/Thumbnails/NEX EnergyPro 750W(mini).png',

            ],
            [
                'category_id' => 5,
                'name' => 'NEX PowerMax 850W',
                'info' => 'Il PowerMax 850W è un alimentatore modulare con certificazione 80 PLUS Gold, progettato per garantire efficienza e affidabilità nei sistemi di fascia alta. Ideale per gaming e workstation potenti.',
                'image' => 'images/Psu/NEX PowerMax 850W.png',
                'thumbnail' => 'images/Psu/Thumbnails/NEX PowerMax 850W(mini).png',

            ],
            [
                'category_id' => 5,
                'name' => 'NEX SilentPower 1000W',
                'info' => 'Il SilentPower 1000W è un alimentatore ultra-silenzioso con certificazione 80 PLUS Platinum, ideale per le configurazioni più esigenti. Progettato per alimentare GPU potenti e CPU NEX CoreX9 senza compromessi.',
                'image' => 'images/Psu/NEX SilentPower 1000W.png',
                'thumbnail' => 'images/Psu/Thumbnails/NEX SilentPower 1000W(mini).png',

            ]

        ]);
    }
}
