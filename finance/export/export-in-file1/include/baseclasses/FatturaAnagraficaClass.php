<?php
Class FatturaAnagraficaClass extends ExtensibleClass{

    protected $denominazione;
    protected $nome;
    protected $cognome;
    protected $titolo;
    protected $eori;
    protected $iva;
    protected $codiceFiscale;
    protected $regimeFiscale;
    protected $sede;
    protected $stabile;
    protected $nazione;
    protected $contatti = [];

    function __construct($nodeXml)
    {
        $this->setNodeXml($nodeXml);
        if ($this->getNodeXml()->Anagrafica->Denominazione) {$this->setDenominazione();}
        $this->setIva();
        $this->setCodiceFiscale();
        $this->setCognome();
        $this->setEori();
        $this->setNazione();
        $this->setNome();
        $this->setTitolo();
    }

    public function newContatto($type, FatturaContattoClass $value){
        $this->contatti[$type] = $value;
    }
    /**
     * @return mixed
     */
    public function getCodiceFiscale()
    {
        return $this->codiceFiscale;
    }

    /**
     * @param mixed $codiceFiscale
     */
    public function setCodiceFiscale()
    {
        $this->codiceFiscale = $this->getNodeXml()->CodiceFiscale;
    }


    /**
     * @return mixed
     */
    public function getDenominazione()
    {
        return $this->denominazione;
    }

    /**
     * @param mixed $denominazione
     */
    public function setDenominazione()
    {
        $this->denominazione = $this->getNodeXml()->Anagrafica->Denominazione;
    }

    /**
     * @return mixed
     */
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * @param mixed $iva
     */
    public function setIva()
    {
        $this->iva = $this->getNodeXml()->IdFiscaleIVA->IdCodice;
    }

    /**
     * @return mixed
     */
    public function getRegimeFiscale()
    {
        return $this->regimeFiscale;
    }

    /**
     * @param mixed $regimeFiscale
     */
    public function setRegimeFiscale($regimeFiscale)
    {
        $this->regimeFiscale = $regimeFiscale;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome()
    {
        $this->nome = $this->getNodeXml()->Anagrafica->Nome;
    }

    /**
     * @return mixed
     */
    public function getCognome()
    {
        return $this->cognome;
    }

    /**
     * @param mixed $cognome
     */
    public function setCognome()
    {
        $this->cognome = $this->getNodeXml()->Anagrafica->Cognome;
    }

    /**
     * @return mixed
     */
    public function getTitolo()
    {
        return $this->titolo;
    }

    /**
     * @param mixed $titolo
     */
    public function setTitolo()
    {
        $this->titolo = $this->getNodeXml()->Anagrafica->Titolo;
    }

    /**
     * @return mixed
     */
    public function getEori()
    {
        return $this->eori;
    }

    /**
     * @param mixed $eori
     */
    public function setEori()
    {
        $this->eori = $this->getNodeXml()->Anagrafica->CodEORI;
    }

    /**
     * @return FatturaIndirizzoClass
     */
    public function getSede()
    {
        return $this->sede;
    }

    /**
     * @param mixed $indirizzo
     */
    public function setSede(FatturaIndirizzoClass $indirizzo)
    {
        $this->sede = $indirizzo;
    }
    /**
     * @return FatturaIndirizzoClass
     */
    public function getStabile()
    {
        return $this->stabile;
    }

    /**
     * @param mixed $indirizzo
     */
    public function setStabile(FatturaIndirizzoClass $indirizzo)
    {
        $this->stabile = $indirizzo;
    }

    /**
     * @return mixed
     */
    public function getNazione()
    {
        return $this->nazione;
    }

    /**
     * @param mixed $nazione
     */
    public function setNazione()
    {
        $this->nazione = $this->getNodeXml()->IdFiscaleIVA->IdPaese ;
    }

    /**
     * @return array
     */
    public function getContatti()
    {
        return $this->contatti;
    }


}