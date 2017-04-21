<?php

class FatturaElettronicaBody extends ExtensibleClass
{
    protected $datiGeneraliDocumento; //2.1
    protected $datiBeniServizi; //2.2
    protected $datiVeicoli;// 1.3
    protected $datiPagamento = []; //1.4
    protected $allegati = []; //1.5
    protected $datiVeicoliIsPresente = false;
    protected $datiPagamentoIsPresente = false;
    protected $allegatiIsPresente = false;

    function __construct(SimpleXMLElement $fatturaBodyXml){

        $this->setNodeXml($fatturaBodyXml);
        $this->check('FatturaElettronicaBody');

        $this->setDatiGeneraliDocumento();
        $this->setDatiBeniServizi();
        $this->checkIfExistAndSet('DatiPagamento');
        $this->checkIfExistAndSet('DatiVeicoli');
        $this->checkIfExistAndSet('Allegati');

    }

    /**
     *
     * @return FatturaDatiTrasmissioneClass|mixed
     */
    public function getDatiGeneraliDocumento()
    {
        return $this->datiGeneraliDocumento;
    }

    /**
     * 1.1 Dati Trasmissione, obbligatorio
     */
    public function setDatiGeneraliDocumento()
    {
        $this->datiGeneraliDocumento = new FatturaElettronicaBodyDatiGeneraliClass($this->getNodeXml()->DatiGenerali);

    }

    /**
     * @return mixed
     */
    public function getDatiBeniServizi()
    {
        return $this->datiBeniServizi;
    }

    /**
     *  1.2 Dati Cedente Prestatore, obbligatorio
     */
    public function setDatiBeniServizi()
    {
        $this->datiBeniServizi = new FatturaElettronicaBodyDatiBeniServiziClass($this->getNodeXml()->DatiBeniServizi);
    }

    /**
     * @return mixed
     */
    public function getDatiVeicoli()
    {
        return $this->datiVeicoli;
    }

    /**
     * 1.3 Rappresentante Fiscale, opzionale
     */
    public function setDatiVeicoli()
    {
        $this->setDatiVeicoliIsPresente(true);
        $this->datiVeicoli = new FatturaElettronicaBodyDatiVeicoliClass( $this->getNodeXml()->DatiVeicoli );
    }

    /**
     * @return mixed
     */
    public function getDatiPagamento()
    {
        return $this->datiPagamento;
    }

    /**
     * 1.4 Cessionario Committente, obbligatorio
     */
    public function setDatiPagamento()
    {
        $this->setDatiPagamentoIsPresente(true);
        foreach ($this->getNodeXml()->DatiPagamento as $datoPagamento){
            $this->datiPagamento[] = new FatturaElettronicaBodyDatiPagamento( $datoPagamento );
        }
    }

    /**
     * @return boolean
     */
    public function getDatiPagamentoIsPresente()
    {
        return $this->datiPagamentoIsPresente;
    }

    /**
     * @param boolean $allegatiIsPresente
     */
    public function setDatiPagamentoIsPresente($datiPagamentoIsPresente)
    {
        $this->datiPagamentoIsPresente = $datiPagamentoIsPresente;
    }


    /**
     * @return boolean
     */
    public function isAllegatiIsPresente()
    {
        return $this->allegatiIsPresente;
    }

    /**
     * @param boolean $allegatiIsPresente
     */
    public function setAllegatiIsPresente($allegatiIsPresente)
    {
        $this->allegatiIsPresente = $allegatiIsPresente;
    }

    /**
     * @return mixed
     */
    public function getAllegati()
    {
        return $this->allegati;
    }

    /**
     * 1.5 Allegati, opzionale
     */
    public function setAllegati()
    {
        $this->setAllegatiIsPresente(true);
        foreach ($this->getNodeXml()->Allegati as $allegato) {
            $this->allegati[] = new FatturaElettronicaBodyAllegatiClass( $allegato);
        }
    }

    /**
     * @return boolean
     */
    public function isDatiVeicoliIsPresente()
    {
        return $this->datiVeicoliIsPresente;
    }

    /**
     * @param boolean $datiVeicoliIsPresente
     */
    public function setDatiVeicoliIsPresente($datiVeicoliIsPresente)
    {
        $this->datiVeicoliIsPresente = $datiVeicoliIsPresente;
    }


}