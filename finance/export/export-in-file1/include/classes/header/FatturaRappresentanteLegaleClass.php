<?php
class FatturaRappresentanteLegaleClass extends FatturaAnagraficaClass {

    protected $rea;
    protected $riferimentoAmministrazione;

    /**
     * @return mixed
     */
    public function getRiferimentoAmministrazione()
    {
        return $this->riferimentoAmministrazione;
    }

    /**
     * @param mixed $riferimentoAmministrazione
     */
    public function setRiferimentoAmministrazione($riferimentoAmministrazione)
    {
        $this->riferimentoAmministrazione = $riferimentoAmministrazione;
    }

    function __construct(SimpleXMLElement $FatturaXml){

        $this->setDenominazione ($FatturaXml->FatturaElettronicaHeader->RappresentanteLegale->DatiAnagrafici->Anagrafica->Denominazione->text );
        $this->setIva($FatturaXml->FatturaElettronicaHeader->RappresentanteLegale->DatiAnagrafici->IdFiscaleIVA->IdCodice->text );
        $this->setNazione($FatturaXml->FatturaElettronicaHeader->RappresentanteLegale->DatiAnagrafici->IdFiscaleIVA->IdPaese->text );
        if( !$this->getDenominazione()){
            $this->setNome($FatturaXml->FatturaElettronicaHeader->RappresentanteLegale->DatiAnagrafici->Anagrafica->Nome->text );
            $this->setCognome($FatturaXml->FatturaElettronicaHeader->RappresentanteLegale->DatiAnagrafici->Anagrafica->Cognome->text );
        }
        $this->setTitolo($FatturaXml->FatturaElettronicaHeader->RappresentanteLegale->DatiAnagrafici->Anagrafica->Titolo->text );
        $this->setEori($FatturaXml->FatturaElettronicaHeader->RappresentanteLegale->DatiAnagrafici->Anagrafica->CodEORI->text );
        $this->setCodiceFiscale($FatturaXml->FatturaElettronicaHeader->RappresentanteLegale->DatiAnagrafici->CodiceFiscale->text );

    }


    /**
     * @return FatturaAnagraficaReaClass
     */
    public function getRea()
    {
        return $this->rea;
    }

    /**
     * @param FatturaAnagraficaReaClass $rea
     */
    public function setRea( FatturaAnagraficaReaClass $rea)
    {
        $this->rea = $rea;
    }
}