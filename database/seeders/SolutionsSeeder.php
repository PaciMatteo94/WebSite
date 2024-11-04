<?php

namespace Database\Seeders;

use App\Models\Solution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolutionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('solutions')->insert([
            [
                'malfunction_id' => 1,
                'title' => 'Sostituzione pompa',
                'description' => 'Spegnere il sistema, scollegare il dissipatore dalla scheda madre e dall\'alimentazione, quindi rimuoverlo dal case. Smontare la pompa e sostituirla con una nuova dello stesso modello',
            ],
            [
                'malfunction_id' => 2,
                'title' => 'Sostituzione tubi',
                'description' => 'Spegnere il computer, scollegare il dissipatore, rimuoverlo e ispezionare i tubi per perdite o usura. Se possibile, sostituire solo i tubi (nei sistemi personalizzati) assicurandosi che i raccordi siano sigillati, quindi reinstallare il dissipatore e verificare l’assenza di perdite.',
            ],
            [
                'malfunction_id' => 3,
                'title' => 'Sostituzione pompa',
                'description' => 'Spegnere il sistema, scollegare il dissipatore dalla scheda madre e dall\'alimentazione, quindi rimuoverlo dal case. Smontare la pompa e sostituirla con una nuova dello stesso modello',
            ],
            [
                'malfunction_id' => 4,
                'title' => 'Sostituzione tubi',
                'description' => 'Spegnere il computer, scollegare il dissipatore, rimuoverlo e ispezionare i tubi per perdite o usura. Se possibile, sostituire solo i tubi (nei sistemi personalizzati) assicurandosi che i raccordi siano sigillati, quindi reinstallare il dissipatore e verificare l’assenza di perdite.',
            ],
            [
                'malfunction_id' => 5,
                'title' => 'Raddrizzamento pin',
                'description' => ' Rimuovere con attenzione il processore e utilizzare una pinzetta per raddrizzare eventuali pin piegati. Installare nuovamente la CPU con delicatezza per evitare piegamenti.',
            ],
            [
                'malfunction_id' => 5,
                'title' => 'Sostituzione',
                'description' => 'Se vi sono pin rotti, sostiuire il processore. Installare nuovamente la CPU con delicatezza.',
            ],
            [
                'malfunction_id' => 6,
                'title' => 'Sostituzione delle sfere di saldatura',
                'description' => 'Rimuovi il processore dalla scheda madre e riscaldalo con attrezzature adatte per sciogliere le vecchie sfere di saldatura, quindi sostituisci le saldature esistenti con nuove sfere e riposiziona il componente con precisione sulla scheda.',
            ],
            [
                'malfunction_id' => 6,
                'title' => 'Rifusione delle saldature',
                'description' => 'Applica calore controllato tramite aria calda o forno a infrarossi per rilassare e rifondere le saldature interne deteriorate senza rimuovere il processore dalla scheda madre.',
            ],

            [
                'malfunction_id' => 7,
                'title' => 'Raddrizzamento pin',
                'description' => ' Rimuovere con attenzione il processore e utilizzare una pinzetta per raddrizzare eventuali pin piegati. Installare nuovamente la CPU con delicatezza per evitare piegamenti.',
            ],
            [
                'malfunction_id' => 7,
                'title' => 'Sostituzione',
                'description' => 'Se vi sono pin rotti, sostiuire il processore. Installare nuovamente la CPU con delicatezza.',
            ],
            [
                'malfunction_id' => 8,
                'title' => 'Sostituzione delle sfere di saldatura',
                'description' => 'Rimuovi il processore dalla scheda madre e riscaldalo con attrezzature adatte per sciogliere le vecchie sfere di saldatura, quindi sostituisci le saldature esistenti con nuove sfere e riposiziona il componente con precisione sulla scheda.',
            ],
            [
                'malfunction_id' => 8,
                'title' => 'Rifusione delle saldature',
                'description' => 'Applica calore controllato tramite aria calda o forno a infrarossi per rilassare e rifondere le saldature interne deteriorate senza rimuovere il processore dalla scheda madre.',
            ],
            [
                'malfunction_id' => 9,
                'title' => 'Raddrizzamento pin',
                'description' => ' Rimuovere con attenzione il processore e utilizzare una pinzetta per raddrizzare eventuali pin piegati. Installare nuovamente la CPU con delicatezza per evitare piegamenti.',
            ],
            [
                'malfunction_id' => 9,
                'title' => 'Sostituzione',
                'description' => 'Se vi sono pin rotti, sostiuire il processore. Installare nuovamente la CPU con delicatezza.',
            ],
            [
                'malfunction_id' => 10,
                'title' => 'Sostituzione delle sfere di saldatura',
                'description' => 'Rimuovi il processore dalla scheda madre e riscaldalo con attrezzature adatte per sciogliere le vecchie sfere di saldatura, quindi sostituisci le saldature esistenti con nuove sfere e riposiziona il componente con precisione sulla scheda.',
            ],
            [
                'malfunction_id' => 10,
                'title' => 'Rifusione delle saldature',
                'description' => 'Applica calore controllato tramite aria calda o forno a infrarossi per rilassare e rifondere le saldature interne deteriorate senza rimuovere il processore dalla scheda madre.',
            ],
            [
                'malfunction_id' => 11,
                'title' => 'Pulizia',
                'description' => 'Spegnere e scollegare il computer, rimuovere la scheda e utilizzare uno spray specifico per rimuovere l’ossidazione dai contatti metallici. Lasciare asciugare e reinstallare con attenzione.',
            ],
            [
                'malfunction_id' => 12,
                'title' => 'Nuova saldatura',
                'description' => 'Per intervenire su condensatori gonfi o scoppiati, individua i condensatori difettosi sulla scheda madre e dissaldali con attenzione utilizzando una stazione di saldatura, evitando di danneggiare le piste circostanti. Pulisci l’area per rimuovere eventuali residui di elettrolita e prepara la scheda per il nuovo componente. Sostituisci i condensatori con nuovi dello stesso valore e polarità, assicurandoti di saldarli correttamente per ristabilire la stabilità del sistema e prevenire futuri malfunzionamenti.',
            ],
            [
                'malfunction_id' => 13,
                'title' => 'Pulizia',
                'description' => 'Spegnere e scollegare il computer, rimuovere la scheda e utilizzare uno spray specifico per rimuovere l’ossidazione dai contatti metallici. Lasciare asciugare e reinstallare con attenzione.',
            ],
            [
                'malfunction_id' => 14,
                'title' => 'Nuova saldatura',
                'description' => 'Per intervenire su condensatori gonfi o scoppiati, individua i condensatori difettosi sulla scheda madre e dissaldali con attenzione utilizzando una stazione di saldatura, evitando di danneggiare le piste circostanti. Pulisci l’area per rimuovere eventuali residui di elettrolita e prepara la scheda per il nuovo componente. Sostituisci i condensatori con nuovi dello stesso valore e polarità, assicurandoti di saldarli correttamente per ristabilire la stabilità del sistema e prevenire futuri malfunzionamenti.',
            ],
            [
                'malfunction_id' => 15,
                'title' => 'Pulizia',
                'description' => 'Spegnere e scollegare il computer, rimuovere la scheda e utilizzare uno spray specifico per rimuovere l’ossidazione dai contatti metallici. Lasciare asciugare e reinstallare con attenzione.',
            ],
            [
                'malfunction_id' => 16,
                'title' => 'Nuova saldatura',
                'description' => 'Per intervenire su condensatori gonfi o scoppiati, individua i condensatori difettosi sulla scheda madre e dissaldali con attenzione utilizzando una stazione di saldatura, evitando di danneggiare le piste circostanti. Pulisci l’area per rimuovere eventuali residui di elettrolita e prepara la scheda per il nuovo componente. Sostituisci i condensatori con nuovi dello stesso valore e polarità, assicurandoti di saldarli correttamente per ristabilire la stabilità del sistema e prevenire futuri malfunzionamenti.',
            ],
            [
                'malfunction_id' => 17,
                'title' => 'Pulizia',
                'description' => 'Rimuovi i moduli di memoria RAM dalla scheda madre e pulisci delicatamente i contatti con un panno morbido leggermente imbevuto di alcol isopropilico per rimuovere l\'ossidazione. Lascia asciugare completamente i moduli prima di reinserirli nella scheda madre, garantendo così un buon contatto elettrico e riducendo il rischio di riavvii o errori di sistema.',
            ],
            [
                'malfunction_id' => 18,
                'title' => 'Sostituzione',
                'description' => 'Per affrontare i settori di memoria danneggiati, esegui un test della memoria utilizzando un software di diagnostica come MemTest86 per identificare i settori difettosi. Se vengono rilevati errori, sostituisci il modulo di RAM compromesso con uno nuovo, poiché la riparazione dei settori danneggiati non è possibile e l\'uso continuato di una RAM difettosa può portare a crash sistematici o schermate blu.',
            ],
            [
                'malfunction_id' => 19,
                'title' => 'Pulizia',
                'description' => 'Rimuovi i moduli di memoria RAM dalla scheda madre e pulisci delicatamente i contatti con un panno morbido leggermente imbevuto di alcol isopropilico per rimuovere l\'ossidazione. Lascia asciugare completamente i moduli prima di reinserirli nella scheda madre, garantendo così un buon contatto elettrico e riducendo il rischio di riavvii o errori di sistema.',
            ],
            [
                'malfunction_id' => 20,
                'title' => 'Sostituzione',
                'description' => 'Per affrontare i settori di memoria danneggiati, esegui un test della memoria utilizzando un software di diagnostica come MemTest86 per identificare i settori difettosi. Se vengono rilevati errori, sostituisci il modulo di RAM compromesso con uno nuovo, poiché la riparazione dei settori danneggiati non è possibile e l\'uso continuato di una RAM difettosa può portare a crash sistematici o schermate blu.',
            ],
            [
                'malfunction_id' => 21,
                'title' => 'Sostituzione condensatori',
                'description' => 'Sostituire i condensatori usurati con componenti equivalenti, seguendo le specifiche di tensione e capacità originali. Se l\'alimentatore è in garanzia, valutarne la sostituzione completa per evitare rischi.',
            ],
            [
                'malfunction_id' => 22,
                'title' => 'Pulizia o sostituzione',
                'description' => 'Pulire la ventola e lubrificare i cuscinetti, se possibile. Se la ventola continua a bloccarsi, sostituirla con una di pari dimensioni e specifiche per mantenere l’alimentazione in condizioni sicure.',
            ],
            [
                'malfunction_id' => 23,
                'title' => 'Sostituzione condensatori',
                'description' => 'Sostituire i condensatori usurati con componenti equivalenti, seguendo le specifiche di tensione e capacità originali. Se l\'alimentatore è in garanzia, valutarne la sostituzione completa per evitare rischi.',
            ],
            [
                'malfunction_id' => 24,
                'title' => 'Pulizia o sostituzione',
                'description' => 'Pulire la ventola e lubrificare i cuscinetti, se possibile. Se la ventola continua a bloccarsi, sostituirla con una di pari dimensioni e specifiche per mantenere l’alimentazione in condizioni sicure.',
            ],
            [
                'malfunction_id' => 25,
                'title' => 'Sostituzione condensatori',
                'description' => 'Sostituire i condensatori usurati con componenti equivalenti, seguendo le specifiche di tensione e capacità originali. Se l\'alimentatore è in garanzia, valutarne la sostituzione completa per evitare rischi.',
            ],
            [
                'malfunction_id' => 26,
                'title' => 'Pulizia o sostituzione',
                'description' => 'Pulire la ventola e lubrificare i cuscinetti, se possibile. Se la ventola continua a bloccarsi, sostituirla con una di pari dimensioni e specifiche per mantenere l’alimentazione in condizioni sicure.',
            ],
            [
                'malfunction_id' => 27,
                'title' => 'Pulizia',
                'description' => 'Pulire le saldature con alcol isopropilico e verificare se il problema si risolve.',
            ],
            [
                'malfunction_id' => 27,
                'title' => 'Rifusione delle saldature',
                'description' => 'Applica calore controllato tramite aria calda o forno a infrarossi per rilassare e rifondere le saldature interne deteriorate senza rimuovere il processore dalla scheda madre.',
            ],
            [
                'malfunction_id' => 28,
                'title' => 'Sostituzione condensatori',
                'description' => 'Sostituire i condensatori guasti con altri dello stesso valore e tipo, assicurandosi della polarità corretta. Se la scheda è in garanzia, considerare la sostituzione completa.',
            ],
            [
                'malfunction_id' => 29,
                'title' => 'Pulizia',
                'description' => 'Pulire le saldature con alcol isopropilico e verificare se il problema si risolve.',
            ],
            [
                'malfunction_id' => 29,
                'title' => 'Rifusione delle saldature',
                'description' => 'Applica calore controllato tramite aria calda o forno a infrarossi per rilassare e rifondere le saldature interne deteriorate senza rimuovere il processore dalla scheda madre.',
            ],
            [
                'malfunction_id' => 30,
                'title' => 'Sostituzione condensatori',
                'description' => 'Sostituire i condensatori guasti con altri dello stesso valore e tipo, assicurandosi della polarità corretta. Se la scheda è in garanzia, considerare la sostituzione completa.',
            ],
            [
                'malfunction_id' => 31,
                'title' => 'Pulizia',
                'description' => 'Pulire le saldature con alcol isopropilico e verificare se il problema si risolve.',
            ],
            [
                'malfunction_id' => 31,
                'title' => 'Rifusione delle saldature',
                'description' => 'Applica calore controllato tramite aria calda o forno a infrarossi per rilassare e rifondere le saldature interne deteriorate senza rimuovere il processore dalla scheda madre.',
            ],
            [
                'malfunction_id' => 32,
                'title' => 'Sostituzione condensatori',
                'description' => 'Sostituire i condensatori guasti con altri dello stesso valore e tipo, assicurandosi della polarità corretta. Se la scheda è in garanzia, considerare la sostituzione completa.',
            ],
            [
                'malfunction_id' => 33,
                'title' => 'Sostituzione',
                'description' => 'Se il motore del disco è bloccato, l’hard disk va sostituito. È possibile tentare un recupero dati professionale, ma il disco non sarà più affidabile per un uso regolare.',
            ],
            [
                'malfunction_id' => 34,
                'title' => 'Isolamento o sostituzione',
                'description' => 'Eseguire uno scan del disco per mappare e isolare i settori danneggiati, in modo che il sistema non li utilizzi. Tuttavia, la sostituzione è consigliata in caso di danni estesi, poiché i settori danneggiati tendono a espandersi col tempo.',
            ],
            [
                'malfunction_id' => 35,
                'title' => 'Sostituzione',
                'description' => 'Se il motore del disco è bloccato, l’hard disk va sostituito. È possibile tentare un recupero dati professionale, ma il disco non sarà più affidabile per un uso regolare.',
            ],
            [
                'malfunction_id' => 36,
                'title' => 'Isolamento o sostituzione',
                'description' => 'Eseguire uno scan del disco per mappare e isolare i settori danneggiati, in modo che il sistema non li utilizzi. Tuttavia, la sostituzione è consigliata in caso di danni estesi, poiché i settori danneggiati tendono a espandersi col tempo.',
            ],
            [
                'malfunction_id' => 37,
                'title' => 'Sostituzione',
                'description' => 'Sostituire lo schermo se il difetto è molto evidente e disturba l’uso quotidiano.',
            ],
            [
                'malfunction_id' => 38,
                'title' => 'Sostituzione pannello',
                'description' => 'inizia smontando con cautela il monitor per accedere al pannello LED o CCFL. Identifica il tipo di retroilluminazione presente nel monitor e sostituisci il pannello difettoso con uno nuovo compatibile, prestando attenzione ai collegamenti e alle schede interne.',
            ],
            [
                'malfunction_id' => 39,
                'title' => 'Sostituzione',
                'description' => 'Sostituire lo schermo se il difetto è molto evidente e disturba l’uso quotidiano.',
            ],
            [
                'malfunction_id' => 40,
                'title' => 'Sostituzione pannello',
                'description' => 'inizia smontando con cautela il monitor per accedere al pannello LED o CCFL. Identifica il tipo di retroilluminazione presente nel monitor e sostituisci il pannello difettoso con uno nuovo compatibile, prestando attenzione ai collegamenti e alle schede interne.',
            ],
            [
                'malfunction_id' => 41,
                'title' => 'Sostituzione',
                'description' => 'Sostituire lo schermo se il difetto è molto evidente e disturba l’uso quotidiano.',
            ],
            [
                'malfunction_id' => 42,
                'title' => 'Sostituzione pannello',
                'description' => 'inizia smontando con cautela il monitor per accedere al pannello LED o CCFL. Identifica il tipo di retroilluminazione presente nel monitor e sostituisci il pannello difettoso con uno nuovo compatibile, prestando attenzione ai collegamenti e alle schede interne.',
            ],
            [
                'malfunction_id' => 43,
                'title' => 'Sostituzione',
                'description' => 'Sostituire lo schermo se il difetto è molto evidente e disturba l’uso quotidiano.',
            ],
            [
                'malfunction_id' => 44,
                'title' => 'Sostituzione pannello',
                'description' => 'inizia smontando con cautela il monitor per accedere al pannello LED o CCFL. Identifica il tipo di retroilluminazione presente nel monitor e sostituisci il pannello difettoso con uno nuovo compatibile, prestando attenzione ai collegamenti e alle schede interne.',
            ],
            [
                'malfunction_id' => 45,
                'title' => 'Lubrificazione o sostituzione',
                'description' => 'Lubrificare i cuscinetti o sostituire la ventola. In caso di ventole economiche o se la ventola è integrata nel componente, potrebbe essere più conveniente sostituirla completamente.',
            ],
            [
                'malfunction_id' => 46,
                'title' => 'Pulizia',
                'description' => ' Pulire accuratamente la ventola per rimuovere eventuali accumuli di polvere. Se le pale sono danneggiate, considerare la sostituzione della ventola, in quanto un bilanciamento imperfetto può causare vibrazioni e ridurre l\'efficienza del raffreddamento.',
            ],
            [
                'malfunction_id' => 47,
                'title' => 'Lubrificazione o sostituzione',
                'description' => 'Lubrificare i cuscinetti o sostituire la ventola. In caso di ventole economiche o se la ventola è integrata nel componente, potrebbe essere più conveniente sostituirla completamente.',
            ],
            [
                'malfunction_id' => 48,
                'title' => 'Pulizia',
                'description' => ' Pulire accuratamente la ventola per rimuovere eventuali accumuli di polvere. Se le pale sono danneggiate, considerare la sostituzione della ventola, in quanto un bilanciamento imperfetto può causare vibrazioni e ridurre l\'efficienza del raffreddamento.',
            ],
            [
                'malfunction_id' => 49,
                'title' => 'Lubrificazione o sostituzione',
                'description' => 'Lubrificare i cuscinetti o sostituire la ventola. In caso di ventole economiche o se la ventola è integrata nel componente, potrebbe essere più conveniente sostituirla completamente.',
            ],
            [
                'malfunction_id' => 50,
                'title' => 'Pulizia',
                'description' => ' Pulire accuratamente la ventola per rimuovere eventuali accumuli di polvere. Se le pale sono danneggiate, considerare la sostituzione della ventola, in quanto un bilanciamento imperfetto può causare vibrazioni e ridurre l\'efficienza del raffreddamento.',
            ],
            [
                'malfunction_id' => 51,
                'title' => 'Lubrificazione o sostituzione',
                'description' => 'Lubrificare i cuscinetti o sostituire la ventola. In caso di ventole economiche o se la ventola è integrata nel componente, potrebbe essere più conveniente sostituirla completamente.',
            ],
            [
                'malfunction_id' => 52,
                'title' => 'Pulizia',
                'description' => ' Pulire accuratamente la ventola per rimuovere eventuali accumuli di polvere. Se le pale sono danneggiate, considerare la sostituzione della ventola, in quanto un bilanciamento imperfetto può causare vibrazioni e ridurre l\'efficienza del raffreddamento.',
            ],

        ]);
    }
}
