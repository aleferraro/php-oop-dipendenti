<?php

/*
Generate la gerarchia di classi in PHP che rappresenta il modello in allegato. La funzione calcola_compenso deve basarsi sui parametri intrinseci dell'oggetto per generare il valore corretto. La funzione to_string deve stampare in formato stringa il contenuto delle proprieta' dell'oggetto su cui e' stata definita. Attenzione ad utilizzare un Trait laddove necessario....
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
    'giorni_lavorati' => 10, 
    'compenso_giornaliero' => 50
]);


$impiegato2 = new ImpiegatoSalariato($impiegato_sal);
$impiegato2->calcola_compenso();

$impiegato2->to_string('Impiegato Salariato');
var_dump($impiegato2);



//prova impiegato a ore

$impiegato_ore = array_merge($dati_impiegato, [
    'ore' => 100, 
    'compenso' => 20
]);


$impiegato3 = new ImpiegatoAOre($impiegato_ore);
$impiegato3->calcola_compenso();

$impiegato3->to_string('Impiegato A Ore');
var_dump($impiegato3);



//prova impiegato a progetto

$impiegato_prog = array_merge($dati_impiegato, [
    'progetto' => 'XXX', 
    'compenso' => 1500
]);


$impiegato4 = new ImpiegatoSuCommissione($impiegato_prog);
$impiegato4->calcola_compenso();

$impiegato4->to_string('Impiegato Su Commissione');
var_dump($impiegato4);

?>