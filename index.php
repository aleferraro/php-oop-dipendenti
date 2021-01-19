<?php

/*
Generate la gerarchia di classi in PHP che rappresenta il modello in allegato. La funzione calcola_compenso deve basarsi sui parametri intrinseci dell'oggetto per generare il valore corretto. La funzione to_string deve stampare in formato stringa il contenuto delle proprieta' dell'oggetto su cui e' stata definita. Attenzione ad utilizzare un Trait laddove necessario....

Aggiornate il codice scritto per l'esercizio di ieri e usate le eccezioni per vincolare / validare l'istanziazione dei nuovi oggetti, facendo rispettare all'utilizzatore delle vostre classi alcune vostre direttive. Nel particolare, inserte nei costruttori delle vostre classi alcune condizioni di validazione ( ad esempio, se un parametro deve essere di un certo tipo [ stringa, intero, ... ] o deve ricadere in un certo range [ solo numeri non negativi, tra 0 e 100, .... ] ) che, nel caso si verifichi un comportamento inaccettabile, lancino una eccezione bloccante. A questo punto, chi ha invocato la costruzione dell'oggetto, deve necessariamente correggere il codice che ha scritto o gestire questa eccezione con un blocco try / catch . Fate poi i vostri test.
*/


require_once('persona.php');
require_once('impiegato.php');
require_once('impiegato_salariato.php');
require_once('impiegato_a_ore.php');
require_once('impiegato_a_commissione.php');



//prova persona
$persona1 = new Persona('Alessandro', 'Ferraro', 'ABCDEF92D27F564E');

$persona1->to_string('Persona');
var_dump($persona1);



//prova impiegato

$dati_impiegato = [
    'nome' => 'Alessandro',
    'cognome' => 'Ferraro',
    'codice_fiscale' => 'ABCDEF92D27F564E',
    'codice_impiegato' => 12
];


$impiegato1 = new Impiegato($dati_impiegato);
$impiegato1->calcola_compenso();

$impiegato1->to_string('Impiegato');
var_dump($impiegato1);



//prova impiegato salariato

$impiegato_sal = array_merge($dati_impiegato, [
    'giorni_lavorati' => 'dieci', 
    'compenso_giornaliero' => 50
]);


$impiegato2 = new ImpiegatoSalariato($impiegato_sal);

try {
    $impiegato2->calcola_compenso();
} catch (Exception $e) {
    echo '<h1>' . $e->getMessage() . '</h1>';
}


$impiegato2->to_string('Impiegato Salariato');
var_dump($impiegato2);



//prova impiegato a ore

$impiegato_ore = array_merge($dati_impiegato, [
    'ore' => 100, 
    'compenso' => 20
]);


$impiegato3 = new ImpiegatoAOre($impiegato_ore);

try {
    $impiegato3->calcola_compenso();
} catch (Exception $e) {
    echo '<h1>' . $e->getMessage() . '</h1>';
}


$impiegato3->to_string('Impiegato A Ore');
var_dump($impiegato3);



//prova impiegato a progetto

$impiegato_prog = array_merge($dati_impiegato, [
    'progetto' => 'XXX', 
    'compenso' => 1500
]);


$impiegato4 = new ImpiegatoSuCommissione($impiegato_prog);

try {
    $impiegato4->calcola_compenso();
} catch (Exception $e) {
    echo '<h1>' . $e->getMessage() . '</h1>';
}


$impiegato4->to_string('Impiegato Su Commissione');
var_dump($impiegato4);

?>