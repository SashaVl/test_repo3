<?php

/**
 * Created by PhpStorm.
 * User: ubuntu-lin
 * Date: 21/02/16
 * Time: 19.17
 */
class FatturaElettronicaBodyDDT
{
    protected $numero;
    protected $data;
    protected $numeroRiferimentoLinea;
    protected $elementXml;

    function __construct(SimpleXMLElement $ddt){
        $this->setElementXml($ddt);
    }

    /**
     * @return SimpleXMLElement
     */
    public function getElementXml()
    {
        return $this->elementXml;
    }

    /**
     * @param mixed $elementXml
     */
    public function setElementXml(SimpleXMLElement $elementXml)
    {
        $this->elementXml = $elementXml;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero()
    {
        $this->numero = $this->getElementXml()->NumeroDDT;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData()
    {
        $this->data = $this->getElementXml()->DataDDT;
    }

    /**
     * @return mixed
     */
    public function getNumeroRiferimentoLinea()
    {
        return $this->numeroRiferimentoLinea;
    }

    /**
     * @param mixed $numeroRiferimentoLinea
     */
    public function setNumeroRiferimentoLinea()
    {
        if($this->getElementXml()->RiferimentoNumeroLinea){
            $this->numeroRiferimentoLinea = $this->getElementXml()->RiferimentoNumeroLinea;
        }
    }

}