<?php

class FatturaElettronicaBodyDatiBeniServiziClass extends ExtensibleClass
{
    protected $dettaglioLinee = [];
    protected $datiRiepilogo;

    function __construct($nodeXml)
    {
        $this->setNodeXml($nodeXml);
        $this->check('DatiBeniServizi');
        
        $this->setDettaglioLinee();
        $this->setDatiRiepilogo();
    }

    /**
     * @return mixed
     */
    public function getDettaglioLinee()
    {
        return $this->dettaglioLinee;
    }

    /**
     * @param mixed $dettaglioLinee
     */
    public function setDettaglioLinee()
    {
        foreach ($this->getNodeXml()->DettaglioLinee as $item) {
                $this->dettaglioLinee[] = new FatturaElettronicaBodyDettagliLineeClass($item);
        }
    }

    /**
     * @return mixed
     */
    public function getDatiRiepilogo()
    {
        return $this->datiRiepilogo;
    }

    /**
     * @param mixed $datiRiepilogo
     */
    public function setDatiRiepilogo()
    {
        $this->datiRiepilogo = new FatturaElettronicaBodyDatiRiepilogoClass($this->getNodeXml()->DatiRiepilogo);
    }

}