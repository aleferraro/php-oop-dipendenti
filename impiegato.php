<?php


require_once('persona.php');

class Impiegato extends Persona {

    private $codice_impiegato;
    protected $compenso = 0;

    public function __construct($init_impiegato){
        parent::__construct(
            $init_impiegato['nome'],
            $init_impiegato['cognome'],
            $init_impiegato['codice_fiscale']
        );

        $this->codice_impiegato = $init_impiegato['codice_impiegato'];
    }

    public function calcola_compenso(){
        $this->compenso = 0;
    }

    public function to_string($titolo){
        
        $string = <<<EOT
        <strong> $titolo </strong><br>
        Codice Impiegato: #$this->codice_impiegato <br>
        Nome: $this->nome <br>
        Cognome: $this->cognome <br>
        Codice Fiscale: $this->codice_fiscale <br>
        Compenso: $this->compenso €<br>
        <br>
        EOT;

        echo $string;
    }

}

?>