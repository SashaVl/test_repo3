<?php

class FatturaElettronicaBodyDatiTrasportoClass extends ExtensibleClass
{
    protected $datiAnagraficiVettore;
    protected $tipoResa;
    protected $dataInizioTrasporto;
    protected $dataOraRitiro;
    protected $mezzoTrasporto;
    protected $descrizione;
    protected $causaleTrasporto;
    protected $numeroColli;
    protected $pesoLordo;
    protected $unitaMisuraPeso;
    protected $pesoNetto;
    protected $indirizzoResa;
    protected $dataOraConsegna;
    protected $nodeXml;
    
    public function __construct($nodeXml)
    {
        $this->setNodeXml($nodeXml);
        if ( $this->getNodeXml()->MezzoTrasporto ){ $this->setMezzoTrasporto();}
        if ( $this->getNodeXml()->DatiAnagraficiVettore ){ $this->setDatiAnagraficiVettore();}
        if ( $this->getNodeXml()->CausaleTrasporto ){ $this->setCausaleTrasporto();}
        if ( $this->getNodeXml()->NumeroColli ){ $this->setNumeroColli();}
        if ( $this->getNodeXml()->Descrizione ){ $this->setDescrizione();}
        if ( $this->getNodeXml()->UnitaMisuraPeso ){ $this->setUnitaMisuraPeso();}
        if ( $this->getNodeXml()->PesoLordo ){ $this->setPesoLordo();}
        if ( $this->getNodeXml()->PesoNetto ){ $this->setPesoNetto();}
        if ( $this->getNodeXml()->DataOraRitiro ){ $this->setDataOraRitiro();}
        if ( $this->getNodeXml()->DataOraConsegna ){ $this->setDataOraConsegna();}
        if ( $this->getNodeXml()->TipoResa ){ $this->setTipoResa();}
        if ( $this->getNodeXml()->IndirizzoResa ){ $this->setIndirizzoResa();}
    }

    /**
     * @return mixed
     */
    public function getDatiAnagraficiVettore()
    {
        return $this->datiAnagraficiVettore;
    }

    /**
     * @param mixed $datiAnagraficiVettore
     */
    public function setDatiAnagraficiVettore()
    {
        $this->datiAnagraficiVettore = new FatturaAnagraficaClass($this->getNodeXml()->DatiAnagraficiVettore);
    }

    /**
     * @return mixed
     */
    public function getTipoResa()
    {
        return $this->tipoResa;
    }

    /**
     * @param mixed $tipoResa
     */
    public function setTipoResa()
    {
        $this->tipoResa = $this->getNodeXml()->TipoResa;
    }

    /**
     * @return mixed
     */
    public function getDataInizioTrasporto()
    {
        return $this->dataInizioTrasporto;
    }

    /**
     * @param mixed $dataInizioTrasporto
     */
    public function setDataInizioTrasporto()
    {
        $this->dataInizioTrasporto = $this->getNodeXml()->DataInizioTrasporto;
    }

    /**
     * @return mixed
     */
    public function getDataOraRitiro()
    {
        return $this->dataOraRitiro;
    }

    /**
     * @param mixed $dataOraRitiro
     */
    public function setDataOraRitiro()
    {
        $this->dataOraRitiro = $this->getNodeXml()->DataOraRitiro;
    }

    /**
     * @return mixed
     */
    public function getMezzoTrasporto()
    {
        return $this->mezzoTrasporto;
    }

    /**
     * @param mixed $mezzoTrasporto
     */
    public function setMezzoTrasporto()
    {
        $this->mezzoTrasporto = $this->getNodeXml()->MezzoTrasporto;
    }

    /**
     * @return mixed
     */
    public function getCausaleTrasporto()
    {
        return $this->causaleTrasporto;
    }

    /**
     * @param mixed $causaleTrasporto
     */
    public function setCausaleTrasporto()
    {
        $this->causaleTrasporto = $this->getNodeXml()->CausaleTrasporto;
    }

    /**
     * @return mixed
     */
    public function getNumeroColli()
    {
        return $this->numeroColli;
    }

    /**
     * @param mixed $numeroColli
     */
    public function setNumeroColli()
    {
        $this->numeroColli = $this->getNodeXml()->NumeroColli ;
    }

    /**
     * @return mixed
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * @param mixed $numeroColli
     */
    public function setDescrizione()
    {
        $this->descrizione = $this->getNodeXml()->Descrizione ;
    }

    /**
     * @return mixed
     */
    public function getPesoLordo()
    {
        return $this->pesoLordo;
    }

    /**
     * @param mixed $pesoLordo
     */
    public function setPesoLordo()
    {
        $this->pesoLordo = $this->getNodeXml()->PesoLordo;
    }

    /**
     * @return mixed
     */
    public function getUnitaMisuraPeso()
    {
        return $this->unitaMisuraPeso;
    }

    /**
     * @param mixed $unitaMisuraPeso
     */
    public function setUnitaMisuraPeso()
    {
        $this->unitaMisuraPeso = $this->getNodeXml()->UnitaMisuraPeso;
    }

    /**
     * @return mixed
     */
    public function getPesoNetto()
    {
        return $this->pesoNetto;
    }

    /**
     * @param mixed $pesoNetto
     */
    public function setPesoNetto()
    {
        $this->pesoNetto = $this->getNodeXml()->PesoNetto;
    }

    /**
     * @return mixed
     */
    public function getIndirizzoResa()
    {
        return $this->indirizzoResa;
    }

    /**
     * @param mixed $indirizzoResa
     */
    public function setIndirizzoResa()
    {
        $this->indirizzoResa = new FatturaIndirizzoClass($this->getNodeXml()->IndirizzoResa);
    }

    /**
     * @return mixed
     */
    public function getDataOraConsegna()
    {
        return $this->dataOraConsegna;
    }

    /**
     * @param mixed $dataOraConsegna
     */
    public function setDataOraConsegna()
    {
        $this->dataOraConsegna = $this->getNodeXml()->DataOraConsegna;
    }
}