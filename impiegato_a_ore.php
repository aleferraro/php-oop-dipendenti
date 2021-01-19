<?php

require_once('impiegato.php');

class ImpiegatoAOre extends Impiegato {

    private $ore_lavorate;
    private $compenso_orario;

    public function __construct($init_impiegato){
        
        parent::__construct($init_impiegato);
        
        $this->ore_lavorate = $init_impiegato['ore'];
        $this->compenso_orario = $init_impiegato['compenso'];
    }

    public function calcola_compenso(){
        $this->compenso = $this->ore_lavorate * $this->compenso_orario;
    }

}


?>