<?php

class FatturaElettronicaBodyDatiContratto
{
    protected $riferimentoNumeroLinea;
    protected $idDocumento;
    protected $Data;
    protected $numItem;
    protected $codiceCommessaConvenzione;
    protected $codiceCUP;
    protected $codiceCIG;

    function __construct(SimpleXMLElement $element){
        $this->setIdDocumento($element->IdDocumento);
        if ($element->RiferimentoNumeroLinea){ $this->setRiferimentoNumeroLinea($element->RiferimentoNumeroLinea); }
        if ($element->Data){ $this->setData($element->Data); }
        if ($element->NumItem){ $this->setNumItem($element->NumItem);}
        if ($element->CodiceCommessaConvenzione){ $this->setCodiceCommessaConvenzione($element->CodiceCommessaConvenzione);}
        if ($element->CodiceCIG){ $this->setCodiceCIG($element->CodiceCIG); }
        if ($element->CodiceCUP){ $this->setCodiceCUP($element->CodiceCUP); }
    }

    /**
     * @return mixed
     */
    public function getRiferimentoNumeroLinea()
    {
        return $this->riferimentoNumeroLinea;
    }

    /**
     * @param mixed $riferimentoNumeroLinea
     */
    public function setRiferimentoNumeroLinea($riferimentoNumeroLinea)
    {
        $this->riferimentoNumeroLinea = $riferimentoNumeroLinea;
    }

    /**
     * @return mixed
     */
    public function getIdDocumento()
    {
        return $this->idDocumento;
    }

    /**
     * @param mixed $idDocumento
     */
    public function setIdDocumento($idDocumento)
    {
        $this->idDocumento = $idDocumento;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->Data;
    }

    /**
     * @param mixed $Data
     */
    public function setData($Data)
    {
        $this->Data = $Data;
    }

    /**
     * @return mixed
     */
    public function getNumItem()
    {
        return $this->numItem;
    }

    /**
     * @param mixed $numItem
     */
    public function setNumItem($numItem)
    {
        $this->numItem = $numItem;
    }

    /**
     * @return mixed
     */
    public function getCodiceCommessaConvenzione()
    {
        return $this->codiceCommessaConvenzione;
    }

    /**
     * @param mixed $codiceCommessaConvenzione
     */
    public function setCodiceCommessaConvenzione($codiceCommessaConvenzione)
    {
        $this->codiceCommessaConvenzione = $codiceCommessaConvenzione;
    }

    /**
     * @return mixed
     */
    public function getCodiceCUP()
    {
        return $this->codiceCUP;
    }

    /**
     * @param mixed $codiceCUP
     */
    public function setCodiceCUP($codiceCUP)
    {
        $this->codiceCUP = $codiceCUP;
    }

    /**
     * @return mixed
     */
    public function getCodiceCIG()
    {
        return $this->codiceCIG;
    }

    /**
     * @param mixed $codiceCIG
     */
    public function setCodiceCIG($codiceCIG)
    {
        $this->codiceCIG = $codiceCIG;
    }
}