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
                'usage_techniques' => 'Ideali per processori ad alte prestazioni, questi sistemi permettono un raffreddamento efficiente grazie alla circolazione del liquido che dissipa il calore lontano dalla CPU. Manutenzione periodica consigliata per evitare perdite',
                'installation_mode' => 'Fissare il radiatore all\'interno del case e collegare le ventole. Montare il blocco della pompa sopra la CPU usando il kit di fissaggio incluso e collegare le alimentazioni e i connettori PWM',
                'image' => 'images/Dissipatori/NEX HydroXtreme 360.png',
                'thumbnail' => 'images/Dissipatori/Thumbnails/NEX HydroXtreme 360(mini).png',

            ],
            [
                'category_id' => 1,
                'name' => 'NEX AcquaForce Pro',
                'info' => 'Il NEX AcquaForce Pro offre raffreddamento a liquido di qualità premium con un radiatore da 240 mm, compatto e versatile. Grazie alle ventole PWM e a un flusso d\'acqua ottimizzato, assicura una gestione termica eccellente per i sistemi di fascia alta e i PC da gaming. Ideale per le CPU NEX CoreX7.',
                'usage_techniques' => 'Ideali per processori ad alte prestazioni, questi sistemi permettono un raffreddamento efficiente grazie alla circolazione del liquido che dissipa il calore lontano dalla CPU. Manutenzione periodica consigliata per evitare perdite',
                'installation_mode' => 'Fissare il radiatore all\'interno del case e collegare le ventole. Montare il blocco della pompa sopra la CPU usando il kit di fissaggio incluso e collegare le alimentazioni e i connettori PWM ',
                'image' => 'images/Dissipatori/NEX AcquaForce Pro.png',
                'thumbnail' => 'images/Dissipatori/Thumbnails/NEX AcquaForce Pro(mini).png',

            ],
            [
                'category_id' => 8,
                'name' => 'NEX VisionEdge 24',
                'info' => 'Il VisionEdge 24 è un monitor da 24 pollici con risoluzione Full HD, perfetto per il gaming e il lavoro quotidiano. Con una frequenza di aggiornamento di 144Hz e tecnologia FreeSync, garantisce immagini fluide e senza tearing. La scelta ideale per i giocatori competitivi.',
                'usage_techniques' => 'Visualizza l\'output grafico del sistema. Configurare la risoluzione e la frequenza di aggiornamento in base alle preferenze e alle capacità del monitor.',
                'installation_mode' => 'Collegare il monitor al PC tramite cavo HDMI, DisplayPort o DVI. Assicurarsi che il monitor sia correttamente alimentato e configurare le impostazioni tramite i driver.',
                'image' => 'images/Monitor/NEX VisionEdge 24.png',
                'thumbnail' => 'images/Monitor/Thumbnails/NEX VisionEdge 24(mini).png',

            ],
            [
                'category_id' => 8,
                'name' => 'NEX UltraView 32',
                'info' => 'Il monitor UltraView 32 offre un display da 32 pollici 4K UHD, pensato per la produttività e la creatività. La sua alta risoluzione e l’accuratezza del colore lo rendono perfetto per i designer e i professionisti. Dotato di supporto HDR e cornice ultrasottile.',
                'usage_techniques' => 'Visualizza l\'output grafico del sistema. Configurare la risoluzione e la frequenza di aggiornamento in base alle preferenze e alle capacità del monitor.',
                'installation_mode' => 'Collegare il monitor al PC tramite cavo HDMI, DisplayPort o DVI. Assicurarsi che il monitor sia correttamente alimentato e configurare le impostazioni tramite i driver.',
                'image' => 'images/Monitor/NEX UltraView 32.png',
                'thumbnail' => 'images/Monitor/Thumbnails/NEX UltraView 32(mini).png',

            ],
            [
                'category_id' => 8,
                'name' => 'NEX QuantumPro 27',
                'info' => 'Il QuantumPro 27 combina un pannello QHD (2560x1440) con tecnologia Quantum Dot per colori vividi e dettagli precisi. Con una frequenza di aggiornamento di 165Hz, è perfetto per chi cerca il massimo della fluidità nelle sessioni di gaming.',
                'usage_techniques' => 'Visualizza l\'output grafico del sistema. Configurare la risoluzione e la frequenza di aggiornamento in base alle preferenze e alle capacità del monitor.',
                'installation_mode' => 'Collegare il monitor al PC tramite cavo HDMI, DisplayPort o DVI. Assicurarsi che il monitor sia correttamente alimentato e configurare le impostazioni tramite i driver.',
                'image' => 'images/Monitor/NEX QuantumPro 27.png',
                'thumbnail' => 'images/Monitor/Thumbnails/NEX QuantumPro 27(mini).png',


            ],
            [
                'category_id' => 8,
                'name' => 'NEX CrystalWave 29',
                'info' => 'Il CrystalWave 29 è un monitor ultrawide da 29 pollici con risoluzione WQHD (3440x1440), progettato per il multitasking e l\'intrattenimento. Grazie al suo design curvo, avvolge lo spettatore, offrendo un’esperienza visiva immersiva.',
                'usage_techniques' => 'Visualizza l\'output grafico del sistema. Configurare la risoluzione e la frequenza di aggiornamento in base alle preferenze e alle capacità del monitor.',
                'installation_mode' => 'Collegare il monitor al PC tramite cavo HDMI, DisplayPort o DVI. Assicurarsi che il monitor sia correttamente alimentato e configurare le impostazioni tramite i driver.',
                'image' => 'images/Monitor/NEX CrystalWave 29.png',
                'thumbnail' => 'images/Monitor/Thumbnails/NEX CrystalWave 29(mini).png',

            ],
            [
                'category_id' => 9,
                'name' => 'NEX AeroSpin 120 White',
                'info' => 'La AeroSpin 120 è una ventola ad alte prestazioni con tecnologia PWM per un controllo dinamico della velocità. Progettata per garantire un flusso d\'aria potente e silenzioso, è perfetta per mantenere freschi i case dei PC da gaming.',
                'usage_techniques' => 'Le ventole migliorano il flusso d’aria all’interno del case, mantenendo i componenti freschi. Posizionarle strategicamente per un buon equilibrio di ingresso e uscita d’aria.',
                'installation_mode' => 'Fissare le ventole ai supporti del case e collegarle ai connettori fan della scheda madre o all’alimentatore. Configurare le velocità tramite il BIOS o software di controllo fan.',
                'image' => 'images/Ventole/NEX AeroSpin 120 White.png',
                'thumbnail' => 'images/Ventole/Thumbnails/NEX AeroSpin 120 White(mini).png',

            ],
            [
                'category_id' => 9,
                'name' => 'NEX AeroSpin 120 Black',
                'info' => 'La AeroSpin 120 è una ventola ad alte prestazioni con tecnologia PWM per un controllo dinamico della velocità. Progettata per garantire un flusso d\'aria potente e silenzioso, è perfetta per mantenere freschi i case dei PC da gaming.',
                'usage_techniques' => 'Le ventole migliorano il flusso d’aria all’interno del case, mantenendo i componenti freschi. Posizionarle strategicamente per un buon equilibrio di ingresso e uscita d’aria.',
                'installation_mode' => 'Fissare le ventole ai supporti del case e collegarle ai connettori fan della scheda madre o all’alimentatore. Configurare le velocità tramite il BIOS o software di controllo fan.',
                'image' => 'images/Ventole/NEX AeroSpin 120 Black.png',
                'thumbnail' => 'images/Ventole/Thumbnails/NEX AeroSpin 120 Black(mini).png',

            ],
            [
                'category_id' => 9,
                'name' => 'NEX HyperWind 140 White',
                'info' => 'La HyperWind 140 è una ventola ottimizzata per i sistemi di raffreddamento ad aria, garantendo alta pressione e flusso costante. Ideale per PC da gaming e workstation che richiedono raffreddamento avanzato.',
                'usage_techniques' => 'Le ventole migliorano il flusso d’aria all’interno del case, mantenendo i componenti freschi. Posizionarle strategicamente per un buon equilibrio di ingresso e uscita d’aria.',
                'installation_mode' => 'Fissare le ventole ai supporti del case e collegarle ai connettori fan della scheda madre o all’alimentatore. Configurare le velocità tramite il BIOS o software di controllo fan.',
                'image' => 'images/Ventole/NEX HyperWind 140 White.png',
                'thumbnail' => 'images/Ventole/Thumbnails/NEX HyperWind 140 White(mini).png',

            ],
            [
                'category_id' => 9,
                'name' => 'NEX HyperWind 140 Black',
                'info' => 'La HyperWind 140 è una ventola ottimizzata per i sistemi di raffreddamento ad aria, garantendo alta pressione e flusso costante. Ideale per PC da gaming e workstation che richiedono raffreddamento avanzato.',
                'usage_techniques' => 'Le ventole migliorano il flusso d’aria all’interno del case, mantenendo i componenti freschi. Posizionarle strategicamente per un buon equilibrio di ingresso e uscita d’aria.',
                'installation_mode' => 'Fissare le ventole ai supporti del case e collegarle ai connettori fan della scheda madre o all’alimentatore. Configurare le velocità tramite il BIOS o software di controllo fan.',
                'image' => 'images/Ventole/NEX HyperWind 140 Black.png',
                'thumbnail' => 'images/Ventole/Thumbnails/NEX HyperWind 140 Black(mini).png',

            ],
            [
                'category_id' => 2,
                'name' => 'NEX CoreX5',
                'info' => 'Il NEX CoreX5 è un processore a 6 core ad alte prestazioni, progettato per PC da gaming e workstation di fascia media. Con un\'elevata frequenza di clock e supporto multi-threading, è perfetto per i giocatori e creatori di contenuti.',
                'usage_techniques' => 'Il cuore del PC, la CPU esegue tutte le istruzioni del sistema operativo e dei programmi. Utilizzare dissipatori adatti per mantenere temperature di esercizio ottimali.',
                'installation_mode' => 'Sollevare il socket della scheda madre e inserire la CPU nel verso indicato. Abbassare la leva di blocco e applicare un sottile strato di pasta termica per un migliore trasferimento di calore.',
                'image' => 'images/Processori/NEX CoreX5.png',
                'thumbnail' => 'images/Processori/Thumbnails/NEX CoreX5(mini).png',

            ],
            [
                'category_id' => 2,
                'name' => 'NEX CoreX7',
                'info' => 'Potenza ed efficienza si uniscono nel CoreX7, un processore a 8 core per utenti esigenti. Ideale per editing video, rendering 3D e gaming di alto livello, con tecnologia avanzata di gestione energetica per mantenere le temperature sotto controllo.',
                'usage_techniques' => 'Il cuore del PC, la CPU esegue tutte le istruzioni del sistema operativo e dei programmi. Utilizzare dissipatori adatti per mantenere temperature di esercizio ottimali.',
                'installation_mode' => 'Sollevare il socket della scheda madre e inserire la CPU nel verso indicato. Abbassare la leva di blocco e applicare un sottile strato di pasta termica per un migliore trasferimento di calore.',
                'image' => 'images/Processori/NEX CoreX7.png',
                'thumbnail' => 'images/Processori/Thumbnails/NEX CoreX7(mini).png',

            ],
            [
                'category_id' => 2,
                'name' => 'NEX CoreX9',
                'info' => 'Il top di gamma CoreX9 offre 12 core e 24 thread, pensato per le workstation professionali e i PC da gaming estremi. Ideale per le applicazioni più pesanti, come machine learning e simulazioni complesse.',
                'usage_techniques' => 'Il cuore del PC, la CPU esegue tutte le istruzioni del sistema operativo e dei programmi. Utilizzare dissipatori adatti per mantenere temperature di esercizio ottimali.',
                'installation_mode' => 'Sollevare il socket della scheda madre e inserire la CPU nel verso indicato. Abbassare la leva di blocco e applicare un sottile strato di pasta termica per un migliore trasferimento di calore.',
                'image' => 'images/Processori/NEX CoreX9.png',
                'thumbnail' => 'images/Processori/Thumbnails/NEX CoreX9(mini).png',

            ],
            [
                'category_id' => 4,
                'name' => 'NEX HyperMemory 16GB DDR5',
                'info' => 'La HyperMemory 16GB DDR5 è progettata per offrire velocità elevate e affidabilità per le build più esigenti. Con una frequenza di 5200 MHz, questa RAM fornisce prestazioni eccellenti per il gaming, il multitasking e le applicazioni professionali. Ideale per utenti che cercano stabilità e potenza nelle loro configurazioni NEX.',
                'usage_techniques' => 'La RAM gestisce i dati temporanei per il funzionamento rapido dei programmi. Installare moduli con velocità e capacità compatibili con la scheda madre.',
                'installation_mode' => 'Inserire i moduli negli slot RAM della scheda madre fino a sentire un clic. Assicurarsi di rispettare la configurazione dual-channel o quad-channel se supportata.',
                'image' => 'images/Memorie/NEX HyperMemory 16GB DDR5.png',
                'thumbnail' => 'images/Memorie/Thumbnails/NEX HyperMemory 16GB DDR5(mini).png',

            ],
            [
                'category_id' => 4,
                'name' => 'NEX VelocityRAM 32GB DDR5',
                'info' => 'La VelocityRAM 32GB DDR5 combina alta capacità con frequenze ultraveloci di 6000 MHz, ideale per carichi di lavoro intensivi come rendering, editing video e gaming di alto livello. Progettata per sistemi avanzati, questa RAM garantisce fluidità anche nelle operazioni più complesse, offrendo affidabilità estrema per i professionisti e gli appassionati di performance.',
                'usage_techniques' => 'La RAM gestisce i dati temporanei per il funzionamento rapido dei programmi. Installare moduli con velocità e capacità compatibili con la scheda madre.',
                'installation_mode' => 'Inserire i moduli negli slot RAM della scheda madre fino a sentire un clic. Assicurarsi di rispettare la configurazione dual-channel o quad-channel se supportata.',
                'image' => 'images/Memorie/NEX VelocityRAM 32GB DDR5.png',
                'thumbnail' => 'images/Memorie/Thumbnails/NEX VelocityRAM 32GB DDR5(mini).png',

            ],
            [
                'category_id' => 7,
                'name' => 'NEX TitanDrive 2TB',
                'info' => 'Il TitanDrive 2TB è un disco rigido affidabile e veloce, ideale per archiviazione di massa e backup. Con una velocità di rotazione di 7200 RPM, offre tempi di accesso rapidi e grande capacità.',
                'usage_techniques' => 'Ideali per lo storage a lungo termine di file e programmi. Sono meno veloci degli SSD ma offrono una maggiore capacità di archiviazione a un prezzo inferiore.',
                'installation_mode' => 'Inserire l’hard disk nell’alloggiamento del case e fissarlo con le viti. Collegare i cavi SATA e l’alimentazione alla scheda madre e all’alimentatore.',
                'image' => 'images/Storage/NEX TitanDrive 2TB.png',
                'thumbnail' => 'images/Storage/Thumbnails/NEX TitanDrive 2TB(mini).png',

            ],
            [
                'category_id' => 7,
                'name' => 'NEX VaultPro 2TB',
                'info' => 'Il VaultPro 2TB è un HDD ad alte prestazioni con capacità di archiviazione extra-large. Perfetto per i creatori di contenuti che hanno bisogno di spazio e affidabilità per i loro file multimediali di grandi dimensioni.',
                'usage_techniques' => 'Ideali per lo storage a lungo termine di file e programmi. Sono meno veloci degli SSD ma offrono una maggiore capacità di archiviazione a un prezzo inferiore.',
                'installation_mode' => 'Inserire l’hard disk nell’alloggiamento del case e fissarlo con le viti. Collegare i cavi SATA e l’alimentazione alla scheda madre e all’alimentatore.',
                'image' => 'images/Storage/NEX VaultPro 2TB.png',
                'thumbnail' => 'images/Storage/Thumbnails/NEX VaultPro 2TB(mini).png',

            ],
            [
                'category_id' => 6,
                'name' => 'NEX VeloCore 3080',
                'info' => 'La VeloCore 3080 è una GPU ad alte prestazioni progettata per il gaming 4K e il rendering in tempo reale. Con un’architettura avanzata e una memoria dedicata da 10GB GDDR6X, offre fluidità e dettagli incredibili.',
                'usage_techniques' => 'Essenziale per le prestazioni grafiche, è particolarmente utile per giochi e applicazioni di grafica avanzata. Utilizzare software aggiornati per garantire la compatibilità con il sistema.',
                'installation_mode' => 'Inserire la scheda nello slot PCIe della scheda madre, fissarla con le viti e collegare i cavi di alimentazione. Installare i driver più recenti per la massima compatibilità.',
                'image' => 'images/Schede-video/NEX VeloCore 3080.png',
                'thumbnail' => 'images/Schede-video/Thumbnails/NEX VeloCore 3080(mini).png',

            ],
            [
                'category_id' => 6,
                'name' => 'NEX GraphiteX 4070',
                'info' => 'La GraphiteX 4070 è la soluzione ideale per i giocatori esigenti e i creativi digitali. Con 12GB di memoria GDDR6, supporta il ray tracing in tempo reale e il rendering di contenuti grafici complessi.',
                'usage_techniques' => 'Essenziale per le prestazioni grafiche, è particolarmente utile per giochi e applicazioni di grafica avanzata. Utilizzare software aggiornati per garantire la compatibilità con il sistema.',
                'installation_mode' => 'Inserire la scheda nello slot PCIe della scheda madre, fissarla con le viti e collegare i cavi di alimentazione. Installare i driver più recenti per la massima compatibilità.',
                'image' => 'images/Schede-video/NEX GraphiteX 4070.png',
                'thumbnail' => 'images/Schede-video/Thumbnails/NEX GraphiteX 4070(mini).png',

            ],
            [
                'category_id' => 6,
                'name' => 'NEX Xcelerate 5090',
                'info' => 'Il top di gamma Xcelerate 5090 offre prestazioni di livello professionale con 16GB di memoria GDDR6X. Progettata per il gaming 8K e la creazione di contenuti VR, è la scelta definitiva per chi desidera potenza estrema.',
                'usage_techniques' => 'Essenziale per le prestazioni grafiche, è particolarmente utile per giochi e applicazioni di grafica avanzata. Utilizzare software aggiornati per garantire la compatibilità con il sistema.',
                'installation_mode' => 'Inserire la scheda nello slot PCIe della scheda madre, fissarla con le viti e collegare i cavi di alimentazione. Installare i driver più recenti per la massima compatibilità.',
                'image' => 'images/Schede-video/NEX Xcelerate 5090.png',
                'thumbnail' => 'images/Schede-video/Thumbnails/NEX Xcelerate 5090(mini).png',

            ],
            [
                'category_id' => 3,
                'name' => 'NEX PowerBoard Z790',
                'info' => 'La PowerBoard Z790 è una scheda madre di fascia alta progettata per le CPU NEX CoreX9. Supporta PCIe 5.0, DDR5, e offre connettività Wi-Fi 6E, rendendola perfetta per gaming e workstation professionali.',
                'usage_techniques' => 'La scheda madre collega e alimenta tutti i componenti del sistema. Assicurarsi che le connessioni siano ben salde per garantire stabilità.',
                'installation_mode' => 'Posizionare la scheda madre nel case e fissarla con le viti. Collegare CPU, RAM, e schede PCIe, oltre ai connettori di alimentazione e front panel.',
                'image' => 'images/Schede-madri/NEX PowerBoard Z790.png',
                'thumbnail' => 'images/Schede-madri/Thumbnails/NEX PowerBoard Z790(mini).png',

            ],
            [
                'category_id' => 3,
                'name' => 'NEX HyperBoard X570',
                'info' => 'La HyperBoard X570 è ideale per le CPU NEX CoreX7, con supporto per PCIe 4.0 e slot M.2 NVMe per SSD ultra-rapidi. Perfetta per gaming di alto livello e lavori di produttività intensiva.',
                'usage_techniques' => 'La scheda madre collega e alimenta tutti i componenti del sistema. Assicurarsi che le connessioni siano ben salde per garantire stabilità.',
                'installation_mode' => 'Posizionare la scheda madre nel case e fissarla con le viti. Collegare CPU, RAM, e schede PCIe, oltre ai connettori di alimentazione e front panel.',
                'image' => 'images/Schede-madri/NEX HyperBoard X570.png',
                'thumbnail' => 'images/Schede-madri/Thumbnails/NEX HyperBoard X570(mini).png',

            ],
            [
                'category_id' => 3,
                'name' => 'NEX ForceBoard B550',
                'info' => 'La ForceBoard B550 è una scheda madre versatile, compatibile con le CPU NEX CoreX5. Offre performance stabili e connettività affidabile, ideale per configurazioni di fascia media.',
                'usage_techniques' => 'La scheda madre collega e alimenta tutti i componenti del sistema. Assicurarsi che le connessioni siano ben salde per garantire stabilità.',
                'installation_mode' => 'Posizionare la scheda madre nel case e fissarla con le viti. Collegare CPU, RAM, e schede PCIe, oltre ai connettori di alimentazione e front panel.',
                'image' => 'images/Schede-madri/NEX ForceBoard B550.png',
                'thumbnail' => 'images/Schede-madri/Thumbnails/NEX ForceBoard B550(mini).png',

            ],
            [
                'category_id' => 5,
                'name' => 'NEX EnergyPro 750W',
                'info' => 'L\'EnergyPro 750W è perfetto per build di fascia media, con efficienza certificata 80 PLUS Bronze. Garantisce potenza stabile e protezione contro sovratensioni per sistemi gaming e produttivi.',
                'usage_techniques' => 'Forniscono energia a tutti i componenti del PC. Selezionare un alimentatore con wattaggio adeguato per il sistema e una certificazione di efficienza (es. 80 Plus)',
                'installation_mode' => 'Posizionare l’alimentatore nell’apposito alloggiamento del case e fissarlo. Collegare i cavi di alimentazione a CPU, scheda madre, GPU e unità di archiviazione.',
                'image' => 'images/Alimentatori/NEX EnergyPro 750W.png',
                'thumbnail' => 'images/Alimentatori/Thumbnails/NEX EnergyPro 750W(mini).png',

            ],
            [
                'category_id' => 5,
                'name' => 'NEX PowerMax 850W',
                'info' => 'Il PowerMax 850W è un alimentatore modulare con certificazione 80 PLUS Gold, progettato per garantire efficienza e affidabilità nei sistemi di fascia alta. Ideale per gaming e workstation potenti.',
                'usage_techniques' => 'Forniscono energia a tutti i componenti del PC. Selezionare un alimentatore con wattaggio adeguato per il sistema e una certificazione di efficienza (es. 80 Plus)',
                'installation_mode' => 'Posizionare l’alimentatore nell’apposito alloggiamento del case e fissarlo. Collegare i cavi di alimentazione a CPU, scheda madre, GPU e unità di archiviazione.',
                'image' => 'images/Alimentatori/NEX PowerMax 850W.png',
                'thumbnail' => 'images/Alimentatori/Thumbnails/NEX PowerMax 850W(mini).png',

            ],
            [
                'category_id' => 5,
                'name' => 'NEX SilentPower 1000W',
                'info' => 'Il SilentPower 1000W è un alimentatore ultra-silenzioso con certificazione 80 PLUS Platinum, ideale per le configurazioni più esigenti. Progettato per alimentare GPU potenti e CPU NEX CoreX9 senza compromessi.',
                'usage_techniques' => 'Forniscono energia a tutti i componenti del PC. Selezionare un alimentatore con wattaggio adeguato per il sistema e una certificazione di efficienza (es. 80 Plus)',
                'installation_mode' => 'Posizionare l’alimentatore nell’apposito alloggiamento del case e fissarlo. Collegare i cavi di alimentazione a CPU, scheda madre, GPU e unità di archiviazione.',
                'image' => 'images/Alimentatori/NEX SilentPower 1000W.png',
                'thumbnail' => 'images/Alimentatori/Thumbnails/NEX SilentPower 1000W(mini).png',

            ]

        ]);
    }
}
