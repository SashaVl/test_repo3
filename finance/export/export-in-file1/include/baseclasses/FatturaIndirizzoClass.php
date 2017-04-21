<?php

class FatturaIndirizzoClass extends ExtensibleClass{
    protected $indirizzo;
    protected $numeroCivico;
    protected $cap;
    protected $comune;
    protected $provincia;
    protected $stato;
    protected $nodeXml;

    function __construct($nodeXml)
    {
        $this->setNodeXml($nodeXml);
        $this->setCap();
        $this->setComune();
        $this->setIndirizzo();
        if ($this->getNodeXml()->NumeroCivico) {$this->setNumeroCivico();}
        $this->setProvincia();
        $this->setStato();

    }

    /**
     * @return mixed
     */
    public function getIndirizzo()
    {
        return $this->indirizzo;
    }

    /**
     * @param mixed $indirizzo
     */
    public function setIndirizzo()
    {
        $this->indirizzo = $this->getNodeXml()->Indirizzo->text;
    }

    /**
     * @return mixed
     */
    public function getNumeroCivico()
    {
        return $this->numeroCivico;
    }

    /**
     * @param mixed $numeroCivico
     */
    public function setNumeroCivico()
    {
        $this->numeroCivico = $this->getNodeXml()->NumeroCivico->text;;
    }
    /**
     * @return mixed
     */
    public function getCap()
    {
        return $this->cap;
    }
    /**
     * @param mixed $cap
     */
    public function setCap()
    {
        $this->cap =$this->getNodeXml()->CAP->text;;
    }

    /**
     * @return mixed
     */
    public function getComune()
    {
        return $this->comune;
    }

    /**
     * @param mixed $comune
     */
    public function setComune()
    {
        $this->comune = $this->getNodeXml()->Comune->text;
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia()
    {
        $this->provincia = $this->getNodeXml()->Provincia->text;
    }

    /**
     * @return mixed
     */
    public function getStato()
    {
        return $this->stato;
    }

    /**
     * @param mixed $stato
     */
    public function setStato()
    {
        $this->stato = $this->getNodeXml()->Stato->text;
    }

}