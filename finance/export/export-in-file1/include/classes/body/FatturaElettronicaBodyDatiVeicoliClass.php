<?php

class FatturaElettronicaBodyDatiVeicoliClass extends ExtensibleClass
{
    protected $data;
    protected $totalePercorso;

    function __construct($nodeXml)
    {
        $this->setNodeXml($nodeXml);
        $this->setData();
        $this->setTotalePercorso();
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
        $this->data = $this->getNodeXml()->Data;
    }

    /**
     * @return mixed
     */
    public function getTotalePercorso()
    {
        return $this->totalePercorso;
    }

    /**
     * @param mixed $totalePercorso
     */
    public function setTotalePercorso()
    {
        $this->totalePercorso = $this->getNodeXml()->TotalePercorso;
    }
    
    

}