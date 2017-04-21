<?php


class FatturaTelefonoClass extends FatturaContattoClass {
    function __construct($value){
        $this->setValore($value);
        $this->setTipo('Telefono');
    }

}