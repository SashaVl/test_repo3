<?php


class FatturaCellulareClass extends FatturaContattoClass{
    function __construct($value){
        $this->setValore($value);
        $this->setTipo('Cellulare');
    }
}