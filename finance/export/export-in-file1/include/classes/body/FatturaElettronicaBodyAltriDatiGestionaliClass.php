<?php

class FatturaElettronicaBodyAltriDatiGestionaliClass extends ExtensibleClass
{
    protected $tipoDato;
    protected $riferimentoTesto;
    protected $riferimentoNumero;
    protected $riferimentoData;

    function __construct($nodeXml)
    {
        $this->setNodeXml($nodeXml);
        $this->check('AltriDatiGestionali');
        $this->setTipoDato();
        $this->checkIfExistAndSet('RiferimentoTesto');
        $this->checkIfExistAndSet('RiferimentoNumero');
        $this->checkIfExistAndSet('RiferimentoData');
    }

    /**
     * @return mixed
     */
    public function getTipoDato()
    {
        return $this->tipoDato;
    }

    /**
     * @param mixed $tipoDato
     */
    public function setTipoDato()
    {
        $this->tipoDato = $this->getNodeXml()->TipoDato;
    }

    /**
     * @return mixed
     */
    public function getRiferimentoTesto()
    {
        return $this->riferimentoTesto;
    }

    /**
     * @param mixed $riferimentoTesto
     */
    public function setRiferimentoTesto()
    {
        $this->riferimentoTesto = $this->getNodeXml()->RiferimentoTesto;
    }

    /**
     * @return mixed
     */
    public function getRiferimentoNumero()
    {
        return $this->riferimentoNumero;
    }

    /**
     * @param mixed $riferimentoNumero
     */
    public function setRiferimentoNumero()
    {
        $this->riferimentoNumero = $this->getNodeXml()->RiferimentoNumero;
    }

    /**
     * @return mixed
     */
    public function getRiferimentoData()
    {
        return $this->riferimentoData;
    }

    /**
     * @param mixed $riferimentoData
     */
    public function setRiferimentoData()
    {
        $this->riferimentoData = $this->getNodeXml()->RiferimentoData;
    }


}