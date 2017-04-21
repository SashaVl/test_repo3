<?php
class FatturaElettronicaCessionarioCommittente extends FatturaAnagraficaClass {

    function __construct(SimpleXMLElement $FatturaCessionarioCommittenteXml){

        if ($FatturaCessionarioCommittenteXml->getName() != 'CessionarioCommittente'){
            throw new FatturaElettronicaNodoErratoException($FatturaCessionarioCommittenteXml->getName());
        }

        parent::__construct($FatturaCessionarioCommittenteXml);

    }
}