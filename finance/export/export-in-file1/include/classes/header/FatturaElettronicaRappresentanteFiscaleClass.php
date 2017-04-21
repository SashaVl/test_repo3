<?php
class FatturaElettronicaRappresentanteFiscaleClass extends FatturaAnagraficaClass {

    function __construct(SimpleXMLElement $FatturaXml){
        if ($FatturaXml->getName() != 'RappresentanteFiscale'){
            throw new FatturaElettronicaNodoErratoException($FatturaXml->getName());
        }
        parent::__construct($FatturaXml->FatturaElettronicaHeader->RappresentanteFiscale->DatiAnagrafici);
        $this->setDenominazione ($FatturaXml->FatturaElettronicaHeader->RappresentanteFiscale->DatiAnagrafici->Anagrafica->Denominazione->text );
        $this->setIva($FatturaXml->FatturaElettronicaHeader->RappresentanteFiscale->DatiAnagrafici->IdFiscaleIVA->IdCodice->text );
        $this->setNazione($FatturaXml->FatturaElettronicaHeader->RappresentanteFiscale->DatiAnagrafici->IdFiscaleIVA->IdPaese->text );
        $this->setCodiceFiscale($FatturaXml->FatturaElettronicaHeader->RappresentanteFiscale->DatiAnagrafici->CodiceFiscale->text );
        if( !$this->getDenominazione()){
            $this->setNome($FatturaXml->FatturaElettronicaHeader->RappresentanteFiscale->DatiAnagrafici->Anagrafica->Nome->text );
            $this->setCognome($FatturaXml->FatturaElettronicaHeader->RappresentanteFiscale->DatiAnagrafici->Anagrafica->Cognome->text );
        }
        $this->setTitolo($FatturaXml->FatturaElettronicaHeader->RappresentanteFiscale->DatiAnagrafici->Anagrafica->Titolo->text );
        $this->setEori($FatturaXml->FatturaElettronicaHeader->RappresentanteFiscale->DatiAnagrafici->Anagrafica->CodEORI->text );

    }
}