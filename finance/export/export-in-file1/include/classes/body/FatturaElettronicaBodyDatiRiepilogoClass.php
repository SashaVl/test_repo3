<?php

class FatturaElettronicaBodyDatiRiepilogoClass extends ExtensibleClass
{
    protected $aliquotaIva;
    protected $natura;
    protected $speseAccessorie;
    protected $arrotondamento;
    protected $imponibileImporto;
    protected $imposta;
    protected $esigibilitaIva;
    protected $riferimentoNormativo;

    function __construct($nodeXml)
    {
        $this->setNodeXml($nodeXml);
        $this->setAliquotaIva();
        $this->setArrotondamento();
        $this->setEsigibilitaIva();
        $this->setImponibileImporto();
        $this->setImposta();
        $this->setNatura();
        $this->setRiferimentoNormativo();
        $this->setSpeseAccessorie();
        
    }

    /**
     * @return mixed
     */
    public function getAliquotaIva()
    {
        return $this->aliquotaIva;
    }

    /**
     * @param mixed $aliquotaIva
     */
    public function setAliquotaIva()
    {
        $this->aliquotaIva = $this->getNodeXml()->AliquotaIva;
    }

    /**
     * @return mixed
     */
    public function getNatura()
    {
        return $this->natura;
    }

    /**
     * @param mixed $natura
     */
    public function setNatura()
    {
        $this->natura = $this->getNodeXml()->Natura;
    }

    /**
     * @return mixed
     */
    public function getSpeseAccessorie()
    {
        return $this->speseAccessorie;
    }

    /**
     * @param mixed $speseAccessorie
     */
    public function setSpeseAccessorie()
    {
        $this->speseAccessorie = $this->getNodeXml()->SpeseAccessorie;
    }

    /**
     * @return mixed
     */
    public function getArrotondamento()
    {
        return $this->arrotondamento;
    }

    /**
     * @param mixed $arrotondamento
     */
    public function setArrotondamento()
    {
        $this->arrotondamento = $this->getNodeXml()->Arrotondamento;
    }

    /**
     * @return mixed
     */
    public function getImponibileImporto()
    {
        return $this->imponibileImporto;
    }

    /**
     * @param mixed $imponibileImporto
     */
    public function setImponibileImporto()
    {
        $this->imponibileImporto = $this->getNodeXml()->ImponibileImporto;
    }

    /**
     * @return mixed
     */
    public function getImposta()
    {
        return $this->imposta;
    }

    /**
     * @param mixed $imposta
     */
    public function setImposta()
    {
        $this->imposta = $this->getNodeXml()->Imposta;
    }

    /**
     * @return mixed
     */
    public function getEsigibilitaIva()
    {
        return $this->esigibilitaIva;
    }

    /**
     * @param mixed $esigibilitaIva
     */
    public function setEsigibilitaIva()
    {
        $this->esigibilitaIva = $this->getNodeXml()->EsigibilitaIva;
    }

    /**
     * @return mixed
     */
    public function getRiferimentoNormativo()
    {
        return $this->riferimentoNormativo;
    }

    /**
     * @param mixed $riferimentoNormativo
     */
    public function setRiferimentoNormativo()
    {
        $this->riferimentoNormativo = $this->getNodeXml()->RiferimentoNormativo;
    }


}