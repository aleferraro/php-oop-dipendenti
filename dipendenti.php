<?php

/*
Generate la gerarchia di classi in PHP che rappresenta il modello in allegato. La funzione calcola_compenso deve basarsi sui parametri intrinseci dell'oggetto per generare il valore corretto. La funzione to_string deve stampare in formato stringa il contenuto delle proprieta' dell'oggetto su cui e' stata definita. Attenzione ad utilizzare un Trait laddove necessario....
*/


//PERSONA
class Persona {
    
    public $nome;
    public $cognome;
    public $codice_fiscale;

    public function __construct($nome, $cognome, $codice_fiscale){
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->codice_fiscale = $codice_fiscale;
    }

    public function to_string($titolo){
        echo '<strong>' . $titolo . '</strong><br>';
        echo 'Nome: ' . $this->nome . '<br>';
        echo 'Cognome: ' . $this->cognome . '<br>';
        echo 'Codice Fiscale: ' . $this->codice_fiscale . '<br>';
        echo '<br>';
    }
}


//IMPIEGATO
class Impiegato extends Persona {

    public $codice_impiegato;
    public $compenso = 0;

    public function __construct($codice_impiegato, $nome, $cognome, $codice_fiscale){
        parent::__construct($nome, $cognome, $codice_fiscale);
        $this->codice_impiegato = $codice_impiegato;
    }

    public function calcola_compenso(){
        $this->compenso = 50;
    }

    public function to_string($titolo){
        echo '<strong>' . $titolo . '</strong><br>';
        echo 'Codice Impiegato: #' . $this->codice_impiegato . '<br>';
        echo 'Nome: ' . $this->nome . '<br>';
        echo 'Cognome: ' . $this->cognome . '<br>';
        echo 'Codice Fiscale: ' . $this->codice_fiscale . '<br>';
        echo 'Compenso: ' . $this->compenso . '€<br>';
        echo '<br>';
    }

}


//IMPIEGATO SALARIATO
class ImpiegatoSalariato extends Impiegato {

    public $giorni_lavorati;
    public $compenso_giornaliero;

    public function __construct($giorni, $compenso, $codice_impiegato, $nome, $cognome, $codice_fiscale){
        parent::__construct($codice_impiegato, $nome, $cognome, $codice_fiscale);
        $this->giorni_lavorati = $giorni;
        $this->compenso_giornaliero = $compenso;
    }

    public function calcola_compenso(){
        $this->compenso = $this->giorni_lavorati * $this->compenso_giornaliero;
    }

}


//IMPIEGATO A ORE
class ImpiegatoAOre extends Impiegato {

    public $ore_lavorate;
    public $compenso_orario;

    public function __construct($ore, $compenso, $codice_impiegato, $nome, $cognome, $codice_fiscale){
        parent::__construct($codice_impiegato, $nome, $cognome, $codice_fiscale);
        $this->ore_lavorate = $ore;
        $this->compenso_orario = $compenso;
    }

    public function calcola_compenso(){
        $this->compenso = $this->ore_lavorate * $this->compenso_orario;
    }

}


//IMPIEGATO A PROGETTO

trait Progetto {

    public $nome_progetto;
    public $commissione_progetto;

}

class ImpiegatoSuCommissione extends Impiegato {

    use Progetto;

    public function __construct($progetto, $compenso, $codice_impiegato, $nome, $cognome, $codice_fiscale){
        parent::__construct($codice_impiegato, $nome, $cognome, $codice_fiscale);
        $this->nome_progetto = $progetto;
        $this->commissione_progetto = $compenso;
    }

    public function calcola_compenso(){
        $this->compenso = $this->commissione_progetto;
    }

}

//prova persona
$persona1 = new Persona('Alessandro', 'Ferraro', 'ABCDEF92D27F564E');

$persona1->to_string('Persona');
var_dump($persona1);

//prova impiegato
$impiegato1 = new Impiegato(12, 'Alessandro', 'Ferraro', 'ABCDEF92D27F564E');
$impiegato1->calcola_compenso();

$impiegato1->to_string('Impiegato');
var_dump($impiegato1);

//prova impiegato salariato
$impiegato2 = new ImpiegatoSalariato(10, 50, 12, 'Alessandro', 'Ferraro', 'ABCDEF92D27F564E');
$impiegato2->calcola_compenso();

$impiegato2->to_string('Impiegato Salariato');
var_dump($impiegato2);

//prova impiegato a ore
$impiegato3 = new ImpiegatoAOre(20, 10, 12, 'Alessandro', 'Ferraro', 'ABCDEF92D27F564E');
$impiegato3->calcola_compenso();

$impiegato3->to_string('Impiegato A Ore');
var_dump($impiegato3);

//prova impiegato a progetto
$impiegato4 = new ImpiegatoSuCommissione('Progetto-X', 250, 12, 'Alessandro', 'Ferraro', 'ABCDEF92D27F564E');
$impiegato4->calcola_compenso();

$impiegato4->to_string('Impiegato Su Commissione');
var_dump($impiegato4);

?>