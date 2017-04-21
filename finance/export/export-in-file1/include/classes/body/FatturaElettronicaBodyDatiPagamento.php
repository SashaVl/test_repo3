<?php

class FatturaElettronicaBodyDatiPagamento extends ExtensibleClass
{
    protected $condizioniPagamento;
    protected $dettaglioPagamento = [];

    function __construct( $nodeXml)
    {
        $this->setNodeXml($nodeXml);
        $this->check('DatiPagamento');
        $this->setDettaglioPagamento();
        $this->setCondizioniPagamento();
    }

    /**
     * @return mixed
     */
    public function getCondizioniPagamento()
    {
        return $this->condizioniPagamento;
    }

    /**
     * @param mixed $condizioniDiPagamento
     */
    public function setDettaglioPagamento()
    {
        foreach ($this->getNodeXml()->DettaglioPagamento as $dettaglio){
            $this->dettaglioPagamento[] = new FatturaElettronicaBodyDettaglioPagamentoClass($dettaglio);
        }
    }

    /**
     * @return array
     */
    public function getDettaglioPagamento()
    {
        return $this->dettaglioPagamento;
    }

    /**
     * @param array $dettaglioPagamento
     */
    public function setCondizioniPagamento()
    {
        $this->dettaglioPagamento = $this->getNodeXml()->CondizioniPagamento;
    }

}