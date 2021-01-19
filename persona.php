<?php


class Persona {
    
    protected $nome;
    protected $cognome;
    protected $codice_fiscale;

    public function __construct($nome, $cognome, $codice_fiscale){
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->codice_fiscale = $codice_fiscale;
    }

    public function to_string($titolo){
       
        $string = <<<EOT
            <strong> $titolo </strong><br>
            Nome: $this->nome <br>
            Cognome: $this->cognome  <br>
            Codice Fiscale: $this->codice_fiscale <br>
            <br>
        EOT;

        echo $string;
    }
}

?>