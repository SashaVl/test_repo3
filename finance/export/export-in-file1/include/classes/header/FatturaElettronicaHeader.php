<?php


class FatturaElettronicaHeader
{
    protected $datiTrasmissione; //1.1
    protected $cedentePrestatore; //1.2
    protected $rappresentanteFiscale;// 1.3
    protected $cessionarioCommittente; //1.4
    protected $terzoIntermediarioOSoggettoEmittente; //1.5
    protected $soggettoEmittente; //1.6
    protected $fatturaHeaderXml;

    function __construct(SimpleXMLElement $fatturaHeaderXml){
        $this->setFatturaHeaderXml($fatturaHeaderXml);
        $this->setDatiTrasmissione();
        $this->setCedentePrestatore();
        $this->setRappresentanteFiscale();
        $this->getSoggettoEmittente();
        $this->setCessionarioCommittente();
    }

    /**
     *
     * @return FatturaDatiTrasmissioneClass|mixed
     */
    public function getDatiTrasmissione()
    {
        return $this->datiTrasmissione;
    }

    /**
     * 1.1 Dati Trasmissione, obbligatorio
     */
    public function setDatiTrasmissione()
    {
        $this->datiTrasmissione = new FatturaDatiTrasmissioneClass($this->getFatturaHeaderXml()->DatiTrasmissione);
    }

    /**
     * @return mixed
     */
    public function getCedentePrestatore()
    {
        return $this->cedentePrestatore;
    }

    /**
     *  1.2 Dati Cedente Prestatore, obbligatorio
     */
    public function setCedentePrestatore()
    {
        $this->cedentePrestatore = new FatturaElettronicaCedentePrestatoreClass($this->getFatturaHeaderXml()->CedentePrestatore);
    }

    /**
     * @return mixed
     */
    public function getRappresentanteFiscale()
    {
        return $this->rappresentanteFiscale;
    }

    /**
     * 1.3 Rappresentante Fiscale, opzionale
     */
    public function setRappresentanteFiscale()
    {
        if (( $this->getFatturaHeaderXml()->RappresentanteFiscale)){
            $this->rappresentanteFiscale = new FatturaElettronicaRappresentanteFiscaleClass( $this->getFatturaHeaderXml()->RappresentanteFiscale );
        }
        $this->rappresentanteFiscale = false;
    }

    /**
     * @return mixed
     */
    public function getCessionarioCommittente()
    {
        return $this->cessionarioCommittente;
    }

    /**
     * 1.4 Cessionario Committente, obbligatorio
     */
    public function setCessionarioCommittente()
    {
        $this->cessionarioCommittente = new FatturaElettronicaCessionarioCommittente( $this->getFatturaHeaderXml()->CessionarioCommittente );
    }

    /**
     * @return mixed
     */
    public function getTerzoIntermediarioOSoggettoEmittente()
    {
        return $this->terzoIntermediarioOSoggettoEmittente;
    }

    /**
     * 1.5 TerzoIntermediarioOSoggettoEmittente, opzionale
     */
    public function setTerzoIntermediarioOSoggettoEmittente()
    {
        $this->terzoIntermediarioOSoggettoEmittente = new FatturaElettronicaTerzoIntermediarioOSoggettoEmittente( $this->getFatturaHeaderXml() );
    }

    /**
     * @return mixed
     */
    public function getSoggettoEmittente()
    {
        if (!$this->soggettoEmittente){
        $this->setSoggettoEmittente();
    }
        $soggetti = [
            ''   => '',
            'CC' => 'Cessionario/Committente',
            'TZ' => 'Terzo',
        ];

        return $soggetti[$this->soggettoEmittente];
    }

    /**
     * 1.6 SoggettoEmittente, opzionale
     */
    public function setSoggettoEmittente()
    {
        $this->soggettoEmittente = $this->getFatturaHeaderXml()->soggettoEmittente->text;
    }

    /**
     * @return SimpleXMLElement
     */
    public function getFatturaHeaderXml()
    {
        return $this->fatturaHeaderXml;
    }

    /**
     * @param SimpleXMLElement $fatturaHeaderXml
     */
    public function setFatturaHeaderXml(SimpleXMLElement $fatturaHeaderXml)
    {
        $this->fatturaHeaderXml = $fatturaHeaderXml;
    }


}