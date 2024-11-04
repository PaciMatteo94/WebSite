<?php

namespace Database\Seeders;

use App\Models\Malfunction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class MalfunctionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('malfunctions')->insert([
            [
                'product_id' => 1,
                'title' => 'Pompa guasta',
                'description' => 'Il dissipatore a liquido può presentare problemi alla pompa dopo circa 2000 ore di utilizzo. La pompa potrebbe iniziare a generare rumori anomali, funzionare in modo intermittente o addirittura bloccarsi, compromettendo la circolazione del liquido e causando il surriscaldamento del sistema.',
            ],
            [
                'product_id' => 1,
                'title' => 'Perdite nei tubi',
                'description' => 'Dopo un lungo periodo di utilizzo, i tubi possono mostrare segni di usura o fessurazioni, specialmente nelle aree di raccordo. Perdite di liquido possono verificarsi tipicamente dopo 18-24 mesi, causando danni a componenti vicini e un netto calo dell’efficienza di raffreddamento.',
            ],
            [
                'product_id' => 2,
                'title' => 'Pompa guasta',
                'description' => 'Il dissipatore a liquido può presentare problemi alla pompa dopo circa 2000 ore di utilizzo. La pompa potrebbe iniziare a generare rumori anomali, funzionare in modo intermittente o addirittura bloccarsi, compromettendo la circolazione del liquido e causando il surriscaldamento del sistema.',
            ],
            [
                'product_id' => 2,
                'title' => 'Perdite nei tubi',
                'description' => 'Dopo un lungo periodo di utilizzo, i tubi possono mostrare segni di usura o fessurazioni, specialmente nelle aree di raccordo. Perdite di liquido possono verificarsi tipicamente dopo 18-24 mesi, causando danni a componenti vicini e un netto calo dell’efficienza di raffreddamento.',
            ],
            [
                'product_id' => 11,
                'title' => 'Pin piegati o rotti',
                'description' => 'Durante l\'installazione o la rimozione del processore, i pin potrebbero subire danni fisici, piegandosi o rompendosi. Questo problema si presenta spesso in seguito a frequenti rimozioni del processore o per utilizzo improprio, causando errori di contatto con il socket.',
            ],
            [
                'product_id' => 11,
                'title' => 'Saldature interne difettose',
                'description' => 'In processori particolarmente stressati termicamente, le saldature interne possono deteriorarsi nel tempo, tipicamente dopo 2-3 anni di utilizzo intenso, portando a instabilità del sistema o malfunzionamenti sotto carico elevato.',
            ],
            [
                'product_id' => 12,
                'title' => 'Pin piegati o rotti',
                'description' => 'Durante l\'installazione o la rimozione del processore, i pin potrebbero subire danni fisici, piegandosi o rompendosi. Questo problema si presenta spesso in seguito a frequenti rimozioni del processore o per utilizzo improprio, causando errori di contatto con il socket.',
            ],
            [
                'product_id' => 12,
                'title' => 'Saldature interne difettose',
                'description' => 'In processori particolarmente stressati termicamente, le saldature interne possono deteriorarsi nel tempo, tipicamente dopo 2-3 anni di utilizzo intenso, portando a instabilità del sistema o malfunzionamenti sotto carico elevato.',
            ],
            [
                'product_id' => 13,
                'title' => 'Pin piegati o rotti',
                'description' => 'Durante l\'installazione o la rimozione del processore, i pin potrebbero subire danni fisici, piegandosi o rompendosi. Questo problema si presenta spesso in seguito a frequenti rimozioni del processore o per utilizzo improprio, causando errori di contatto con il socket.',
            ],
            [
                'product_id' => 13,
                'title' => 'Saldature interne difettose',
                'description' => 'In processori particolarmente stressati termicamente, le saldature interne possono deteriorarsi nel tempo, tipicamente dopo 2-3 anni di utilizzo intenso, portando a instabilità del sistema o malfunzionamenti sotto carico elevato.',
            ],
            [
                'product_id' => 21,
                'title' => 'Ossidazione delle saldature',
                'description' => 'Con il passare degli anni e l\'esposizione all\'umidità, le saldature della scheda madre possono ossidarsi, compromettendo le connessioni e causando malfunzionamenti. Questo fenomeno è comune in ambienti umidi e tende a manifestarsi dopo circa 3-4 anni.',
            ],
            [
                'product_id' => 21,
                'title' => 'Condensatori gonfi o scoppiati',
                'description' => 'Dopo 2-3 anni di utilizzo, i condensatori possono mostrare segni di usura o gonfiarsi, perdendo efficienza e causando problemi di stabilità del sistema, spegnimenti improvvisi o mancata accensione della scheda madre.',
            ],
            [
                'product_id' => 22,
                'title' => 'Ossidazione delle saldature',
                'description' => 'Con il passare degli anni e l\'esposizione all\'umidità, le saldature della scheda madre possono ossidarsi, compromettendo le connessioni e causando malfunzionamenti. Questo fenomeno è comune in ambienti umidi e tende a manifestarsi dopo circa 3-4 anni.',
            ],
            [
                'product_id' => 22,
                'title' => 'Condensatori gonfi o scoppiati',
                'description' => 'Dopo 2-3 anni di utilizzo, i condensatori possono mostrare segni di usura o gonfiarsi, perdendo efficienza e causando problemi di stabilità del sistema, spegnimenti improvvisi o mancata accensione della scheda madre.',
            ],
            [
                'product_id' => 23,
                'title' => 'Ossidazione delle saldature',
                'description' => 'Con il passare degli anni e l\'esposizione all\'umidità, le saldature della scheda madre possono ossidarsi, compromettendo le connessioni e causando malfunzionamenti. Questo fenomeno è comune in ambienti umidi e tende a manifestarsi dopo circa 3-4 anni.',
            ],
            [
                'product_id' => 23,
                'title' => 'Condensatori gonfi o scoppiati',
                'description' => 'Dopo 2-3 anni di utilizzo, i condensatori possono mostrare segni di usura o gonfiarsi, perdendo efficienza e causando problemi di stabilità del sistema, spegnimenti improvvisi o mancata accensione della scheda madre.',
            ],
            [
                'product_id' => 14,
                'title' => 'Contatti ossidati',
                'description' => 'Nel tempo, i contatti delle memorie RAM possono ossidarsi, soprattutto in ambienti umidi, causando problemi di riconoscimento da parte della scheda madre. Questo problema tende a manifestarsi dopo circa 2 anni e causa frequenti riavvii o errori di sistema.',
            ],
            [
                'product_id' => 14,
                'title' => 'Settori di memoria danneggiati',
                'description' => 'Con l’usura, alcuni settori delle memorie RAM possono danneggiarsi, portando a crash improvvisi o schermate blu. Questo malfunzionamento è frequente dopo un uso intenso e prolungato, oltre i 3 anni.',
            ],
            [
                'product_id' => 15,
                'title' => 'Contatti ossidati',
                'description' => 'Nel tempo, i contatti delle memorie RAM possono ossidarsi, soprattutto in ambienti umidi, causando problemi di riconoscimento da parte della scheda madre. Questo problema tende a manifestarsi dopo circa 2 anni e causa frequenti riavvii o errori di sistema.',
            ],
            [
                'product_id' => 15,
                'title' => 'Settori di memoria danneggiati',
                'description' => 'Con l’usura, alcuni settori delle memorie RAM possono danneggiarsi, portando a crash improvvisi o schermate blu. Questo malfunzionamento è frequente dopo un uso intenso e prolungato, oltre i 3 anni.',
            ],
            [
                'product_id' => 24,
                'title' => 'Condensatori usurati',
                'description' => 'Gli alimentatori possono presentare condensatori gonfi o usurati dopo 2-3 anni di uso intenso, portando a cali di tensione, spegnimenti improvvisi o addirittura al mancato avvio del sistema.',
            ],
            [
                'product_id' => 24,
                'title' => 'Ventola bloccata',
                'description' => 'La ventola dell’alimentatore può bloccarsi a causa della polvere o dell’usura nei cuscinetti dopo 1-2 anni, compromettendo il raffreddamento interno e causando un surriscaldamento dell’unità.',
            ],
            [
                'product_id' => 25,
                'title' => 'Condensatori usurati',
                'description' => 'Gli alimentatori possono presentare condensatori gonfi o usurati dopo 2-3 anni di uso intenso, portando a cali di tensione, spegnimenti improvvisi o addirittura al mancato avvio del sistema.',
            ],
            [
                'product_id' => 25,
                'title' => 'Ventola bloccata',
                'description' => 'La ventola dell’alimentatore può bloccarsi a causa della polvere o dell’usura nei cuscinetti dopo 1-2 anni, compromettendo il raffreddamento interno e causando un surriscaldamento dell’unità.',
            ],
            [
                'product_id' => 26,
                'title' => 'Condensatori usurati',
                'description' => 'Gli alimentatori possono presentare condensatori gonfi o usurati dopo 2-3 anni di uso intenso, portando a cali di tensione, spegnimenti improvvisi o addirittura al mancato avvio del sistema.',
            ],
            [
                'product_id' => 26,
                'title' => 'Ventola bloccata',
                'description' => 'La ventola dell’alimentatore può bloccarsi a causa della polvere o dell’usura nei cuscinetti dopo 1-2 anni, compromettendo il raffreddamento interno e causando un surriscaldamento dell’unità.',
            ],
            [
                'product_id' => 18,
                'title' => 'Ossidazione delle saldature',
                'description' => 'Anche le schede video possono riscontrare ossidazione nelle saldature dopo 3-4 anni, specialmente nei punti vicini alle VRAM e alla GPU. Questo fenomeno può causare artefatti grafici, sfarfallii o crash durante il rendering di applicazioni grafiche.',
            ],
            [
                'product_id' => 18,
                'title' => 'Condensatori danneggiati',
                'description' => 'Condensatori usurati o danneggiati dopo un uso prolungato (2-3 anni) possono portare a instabilità, come blocchi improvvisi durante l’uso di software grafico o di gioco.',
            ],
            [
                'product_id' => 19,
                'title' => 'Ossidazione delle saldature',
                'description' => 'Anche le schede video possono riscontrare ossidazione nelle saldature dopo 3-4 anni, specialmente nei punti vicini alle VRAM e alla GPU. Questo fenomeno può causare artefatti grafici, sfarfallii o crash durante il rendering di applicazioni grafiche.',
            ],
            [
                'product_id' => 19,
                'title' => 'Condensatori danneggiati',
                'description' => 'Condensatori usurati o danneggiati dopo un uso prolungato (2-3 anni) possono portare a instabilità, come blocchi improvvisi durante l’uso di software grafico o di gioco.',
            ],
            [
                'product_id' => 20,
                'title' => 'Ossidazione delle saldature',
                'description' => 'Anche le schede video possono riscontrare ossidazione nelle saldature dopo 3-4 anni, specialmente nei punti vicini alle VRAM e alla GPU. Questo fenomeno può causare artefatti grafici, sfarfallii o crash durante il rendering di applicazioni grafiche.',
            ],
            [
                'product_id' => 20,
                'title' => 'Condensatori danneggiati',
                'description' => 'Condensatori usurati o danneggiati dopo un uso prolungato (2-3 anni) possono portare a instabilità, come blocchi improvvisi durante l’uso di software grafico o di gioco.',
            ],
            [
                'product_id' => 16,
                'title' => 'Motore del disco bloccato',
                'description' => 'Dopo un uso intenso, il motore dell’hard disk può iniziare a presentare problemi, impedendo al disco di girare correttamente. Questo malfunzionamento si manifesta solitamente dopo 4-5 anni e causa lentezza nell’accesso ai file o errori di avvio.',
            ],
            [
                'product_id' => 16,
                'title' => 'Settori danneggiati',
                'description' => 'Settori danneggiati sul disco si sviluppano con il tempo, in genere dopo i 3 anni, causando lentezza nel caricamento dei file, errori di sistema e difficoltà di accesso ai dati.',
            ],
            [
                'product_id' => 17,
                'title' => 'Motore del disco bloccato',
                'description' => 'Dopo un uso intenso, il motore dell’hard disk può iniziare a presentare problemi, impedendo al disco di girare correttamente. Questo malfunzionamento si manifesta solitamente dopo 4-5 anni e causa lentezza nell’accesso ai file o errori di avvio.',
            ],
            [
                'product_id' => 17,
                'title' => 'Settori danneggiati',
                'description' => 'Settori danneggiati sul disco si sviluppano con il tempo, in genere dopo i 3 anni, causando lentezza nel caricamento dei file, errori di sistema e difficoltà di accesso ai dati.',
            ],
            [
                'product_id' => 5,
                'title' => 'Pixel bruciati',
                'description' => 'Dopo un uso prolungato, alcuni pixel sullo schermo potrebbero non funzionare più correttamente, apparendo come punti neri o colorati. Questo fenomeno è comune nei monitor dopo circa 3-4 anni di utilizzo.',
            ],
            [
                'product_id' => 5,
                'title' => 'Retroilluminazione debole',
                'description' => 'La retroilluminazione dei monitor può perdere intensità nel tempo, causando una visualizzazione meno chiara e più scura. Questo difetto appare tipicamente dopo 3-5 anni di utilizzo regolare.',
            ],
            [
                'product_id' => 6,
                'title' => 'Pixel bruciati',
                'description' => 'Dopo un uso prolungato, alcuni pixel sullo schermo potrebbero non funzionare più correttamente, apparendo come punti neri o colorati. Questo fenomeno è comune nei monitor dopo circa 3-4 anni di utilizzo.',
            ],
            [
                'product_id' => 6,
                'title' => 'Retroilluminazione debole',
                'description' => 'La retroilluminazione dei monitor può perdere intensità nel tempo, causando una visualizzazione meno chiara e più scura. Questo difetto appare tipicamente dopo 3-5 anni di utilizzo regolare.',
            ],
            [
                'product_id' => 3,
                'title' => 'Pixel bruciati',
                'description' => 'Dopo un uso prolungato, alcuni pixel sullo schermo potrebbero non funzionare più correttamente, apparendo come punti neri o colorati. Questo fenomeno è comune nei monitor dopo circa 3-4 anni di utilizzo.',
            ],
            [
                'product_id' => 3,
                'title' => 'Retroilluminazione debole',
                'description' => 'La retroilluminazione dei monitor può perdere intensità nel tempo, causando una visualizzazione meno chiara e più scura. Questo difetto appare tipicamente dopo 3-5 anni di utilizzo regolare.',
            ],
            [
                'product_id' => 4,
                'title' => 'Pixel bruciati',
                'description' => 'Dopo un uso prolungato, alcuni pixel sullo schermo potrebbero non funzionare più correttamente, apparendo come punti neri o colorati. Questo fenomeno è comune nei monitor dopo circa 3-4 anni di utilizzo.',
            ],
            [
                'product_id' => 4,
                'title' => 'Retroilluminazione debole',
                'description' => 'La retroilluminazione dei monitor può perdere intensità nel tempo, causando una visualizzazione meno chiara e più scura. Questo difetto appare tipicamente dopo 3-5 anni di utilizzo regolare.',
            ],

            [
                'product_id' => 7,
                'title' => 'Motore usurato',
                'description' => 'Dopo 1-2 anni di uso continuo, il motore della ventola può iniziare a emettere rumori anomali o perdere velocità, riducendo l’efficienza di raffreddamento del case e causando surriscaldamento dei componenti.',
            ],
            [
                'product_id' => 7,
                'title' => 'Pale sbilanciate',
                'description' => 'L’accumulo di polvere o piccole deformazioni nelle pale delle ventole può causare vibrazioni e rumori accentuati. Questo problema è comune dopo circa 18 mesi di utilizzo.',
            ],
            [
                'product_id' => 8,
                'title' => 'Motore usurato',
                'description' => 'Dopo 1-2 anni di uso continuo, il motore della ventola può iniziare a emettere rumori anomali o perdere velocità, riducendo l’efficienza di raffreddamento del case e causando surriscaldamento dei componenti.',
            ],
            [
                'product_id' => 8,
                'title' => 'Pale sbilanciate',
                'description' => 'L’accumulo di polvere o piccole deformazioni nelle pale delle ventole può causare vibrazioni e rumori accentuati. Questo problema è comune dopo circa 18 mesi di utilizzo.',
            ],
            [
                'product_id' => 9,
                'title' => 'Motore usurato',
                'description' => 'Dopo 1-2 anni di uso continuo, il motore della ventola può iniziare a emettere rumori anomali o perdere velocità, riducendo l’efficienza di raffreddamento del case e causando surriscaldamento dei componenti.',
            ],
            [
                'product_id' => 9,
                'title' => 'Pale sbilanciate',
                'description' => 'L’accumulo di polvere o piccole deformazioni nelle pale delle ventole può causare vibrazioni e rumori accentuati. Questo problema è comune dopo circa 18 mesi di utilizzo.',
            ],
            [
                'product_id' => 10,
                'title' => 'Motore usurato',
                'description' => 'Dopo 1-2 anni di uso continuo, il motore della ventola può iniziare a emettere rumori anomali o perdere velocità, riducendo l’efficienza di raffreddamento del case e causando surriscaldamento dei componenti.',
            ],
            [
                'product_id' => 10,
                'title' => 'Pale sbilanciate',
                'description' => 'L’accumulo di polvere o piccole deformazioni nelle pale delle ventole può causare vibrazioni e rumori accentuati. Questo problema è comune dopo circa 18 mesi di utilizzo.',
            ]

        ]);
    }
}
