<?php
class FatturaElettronicaTerzoIntermediarioOSoggettoEmittente extends FatturaAnagraficaClass {

    function __construct(SimpleXMLElement $FatturaXml){

        $this->setDenominazione ($FatturaXml->FatturaElettronicaHeader->TerzoIntermediarioOSoggettoEmittente->DatiAnagrafici->Anagrafica->Denominazione->text );
        $this->setIva($FatturaXml->FatturaElettronicaHeader->TerzoIntermediarioOSoggettoEmittente->DatiAnagrafici->IdFiscaleIVA->IdCodice->text );
        $this->setNazione($FatturaXml->FatturaElettronicaHeader->TerzoIntermediarioOSoggettoEmittente->DatiAnagrafici->IdFiscaleIVA->IdPaese->text );
        if( !$this->getDenominazione()){
            $this->setNome($FatturaXml->FatturaElettronicaHeader->TerzoIntermediarioOSoggettoEmittente->DatiAnagrafici->Anagrafica->Nome->text );
            $this->setCognome($FatturaXml->FatturaElettronicaHeader->TerzoIntermediarioOSoggettoEmittente->DatiAnagrafici->Anagrafica->Cognome->text );
        }
        $this->setTitolo($FatturaXml->FatturaElettronicaHeader->TerzoIntermediarioOSoggettoEmittente->DatiAnagrafici->Anagrafica->Titolo->text );
        $this->setEori($FatturaXml->FatturaElettronicaHeader->TerzoIntermediarioOSoggettoEmittente->DatiAnagrafici->Anagrafica->CodEORI->text );
    }
}