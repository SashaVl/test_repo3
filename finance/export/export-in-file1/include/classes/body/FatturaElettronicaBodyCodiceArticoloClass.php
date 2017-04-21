<?php

class FatturaElettronicaBodyCodiceArticoloClass extends ExtensibleClass
{
    protected $codiceTipo;
    protected $codiceValore;

    function __construct($nodeXml)
    {
        $this->setNodeXml($nodeXml);
        $this->check('CodiceArticolo');

        $this->setCodiceTipo();
        $this->setCodiceValore();
    }

    /**
     * @return mixed
     */
    public function getCodiceTipo()
    {
        return $this->codiceTipo;
    }

    /**
     * @param mixed $codiceTipo
     */
    public function setCodiceTipo()
    {
        $this->codiceTipo = $this->getNodeXml()->CodiceTipo;
    }

    /**
     * @return mixed
     */
    public function getCodiceValore()
    {
        return $this->codiceValore;
    }

    /**
     * @param mixed $codiceValore
     */
    public function setCodiceValore()
    {
        $this->codiceValore = $this->getNodeXml()->CodiceValore;
    }



}