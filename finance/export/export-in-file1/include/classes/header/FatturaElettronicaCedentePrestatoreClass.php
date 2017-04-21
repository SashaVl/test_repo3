<?php
class FatturaElettronicaCedentePrestatoreClass extends FatturaAnagraficaClass {

    protected $rea;
    protected $riferimentoAmministrazione;
    protected $albo;
    protected $alboProvincia;
    protected $alboNumeroIscrizione;
    protected $alboDataIscrizione;

    function __construct(SimpleXMLElement $FatturaCedentePrestatoreXml){

        if ($FatturaCedentePrestatoreXml->getName() != 'CedentePrestatore'){
            throw new FatturaElettronicaNodoErratoException($FatturaCedentePrestatoreXml->getName());
        }

        parent::__construct($FatturaCedentePrestatoreXml);
        $this->setAlbo($FatturaCedentePrestatoreXml->DatiAnagrafici->AlboProfessionale->text);
        $this->setAlboDataIscrizione($FatturaCedentePrestatoreXml->DatiAnagrafici->DataIscrizioneAlbo->text);
        $this->setAlboNumeroIscrizione($FatturaCedentePrestatoreXml->DatiAnagrafici->NumeroIscrizioneAlbo->text);
        $this->setAlboProvincia($FatturaCedentePrestatoreXml->DatiAnagrafici->ProvinciaAlbo->text);
        $this->setRegimeFiscale ($FatturaCedentePrestatoreXml->DatiAnagrafici->RegimeFiscale->text);
        $this->setCodiceFiscale($FatturaCedentePrestatoreXml->DatiAnagrafici->CodiceFiscale->text);
        $this->setSede(new FatturaIndirizzoClass($FatturaCedentePrestatoreXml->Sede));
        if ( $FatturaCedentePrestatoreXml->StabileOrganizzazione ){
            $this->setStabile(new FatturaIndirizzoClass($FatturaCedentePrestatoreXml->StabileOrganizzazione ));
        }
        if ( $FatturaCedentePrestatoreXml->IscrizioneREA ){
            $this->setRea(new FatturaAnagraficaReaClass());
            $this->getRea()->setUfficio($FatturaCedentePrestatoreXml->IscrizioneREA->Ufficio->text );
            $this->getRea()->setNumeroRea($FatturaCedentePrestatoreXml->IscrizioneREA->NumeroREA->text );
            $this->getRea()->setCapitaleSociale($FatturaCedentePrestatoreXml->IscrizioneREA->CapitaleSociale->text );
            $this->getRea()->setSocioUnico($FatturaCedentePrestatoreXml->IscrizioneREA->SocioUnico->text );
            $this->getRea()->setStatoLiquidazione($FatturaCedentePrestatoreXml->IscrizioneREA->StatoLiqudazione->text );
        }
        if ( $FatturaCedentePrestatoreXml->Contatti->Telefono ){
            $this->newContatto('telefono', new FatturaTelefonoClass($FatturaCedentePrestatoreXml->Contatti->Telefono->text));
        }
        if ( $FatturaCedentePrestatoreXml->Contatti->Email) {
            $this->newContatto('email', new FatturaEmailClass($FatturaCedentePrestatoreXml->Contatti->Telefono->text));
        }
        if ( $FatturaCedentePrestatoreXml->Contatti->Fax) {
            $this->newContatto('fax', new FatturaEmailClass($FatturaCedentePrestatoreXml->Contatti->Fax->text));
        }
        if ( $FatturaCedentePrestatoreXml->RiferimentoAmministrazione) {
            $this->setRiferimentoAmministrazione($FatturaCedentePrestatoreXml->RiferimentoAmministrazione->text );
        }

    }

    /**
     * @return mixed
     */
    public function getAlbo()
    {
        return $this->albo;
    }

    /**
     * @param mixed $albo
     */
    public function setAlbo($albo)
    {
        $this->albo = $albo;
    }

    /**
     * @return mixed
     */
    public function getAlboProvincia()
    {
        return $this->alboProvincia;
    }

    /**
     * @param mixed $alboProvincia
     */
    public function setAlboProvincia($alboProvincia)
    {
        $this->alboProvincia = $alboProvincia;
    }

    /**
     * @return mixed
     */
    public function getAlboNumeroIscrizione()
    {
        return $this->alboNumeroIscrizione;
    }

    /**
     * @param mixed $alboNumeroIscrizione
     */
    public function setAlboNumeroIscrizione($alboNumeroIscrizione)
    {
        $this->alboNumeroIscrizione = $alboNumeroIscrizione;
    }

    /**
     * @return mixed
     */
    public function getAlboDataIscrizione()
    {
        return $this->alboDataIscrizione;
    }

    /**
     * @param mixed $alboDataIscrizione
     */
    public function setAlboDataIscrizione($alboDataIscrizione)
    {
        $this->alboDataIscrizione = $alboDataIscrizione;
    }

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