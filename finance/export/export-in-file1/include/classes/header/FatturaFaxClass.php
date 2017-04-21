<?php


class FatturaFaxClass extends FatturaContattoClass{
    function __construct($value){
        $this->setValore($value);
        $this->setTipo('Fax');
    }
}