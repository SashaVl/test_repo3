<?php

class FatturaElettronicaBodyDettagliLineeClass extends ExtensibleClass
{
    protected $numeroLinea;
    protected $tipoCessionePrestazione;
    protected $codiceArticoloIsPresente = false;
    protected $codiciArticoli= [];
    protected $descrizione;
    protected $quantita;
    protected $unitaMisura;
    protected $dataInizioPeriodo;
    protected $dataFinePeriodo;
    protected $prezzoUnitario;
    protected $scontoMaggiorazioneIsPresente = false;
    protected $scontoMaggiorazione = [];
    protected $prezzoTotale;
    protected $aliquotaIva;
    protected $ritenuta;
    protected $natura;
    protected $riferimentoAmministrazione;
    protected $altriDatiGestionaleIsPresente = false;
    protected $altriDatiGestionali = [];

    function __construct($nodeXml)
    {
        $this->setNodeXml($nodeXml);
        $this->check('DettaglioLinee');
        $this->setNumeroLinea();
        if ($this->getNodeXml()->TipoCessionePrestazione) { $this->setTipoCessionePrestazione();}
        if ($this->getNodeXml()->CodiceArticoli){
            $this->setCodiciArticoli();
        }
        $this->setDescrizione();
        $this->checkIfExistAndSet('Quantita');
        $this->checkIfExistAndSet('UnitaMisura');
        $this->checkIfExistAndSet('DataInizioPeriodo');
        $this->checkIfExistAndSet('DataFinePeriodo');
        $this->setPrezzoUnitario();
        $this->checkIfExistAndSet('ScontoMaggiorazione');
        $this->setPrezzoTotale();
        $this->setAliquotaIva();
        $this->checkIfExistAndSet('Ritenuta');
        $this->checkIfExistAndSet('Natura');
        $this->checkIfExistAndSet('RiferimentoAmministrativo');
        $this->checkIfExistAndSet('AltriDatiGestionali');

    }

    /**
     * @return mixed
     */
    public function getNumeroLinea()
    {
        return $this->numeroLinea;
    }

    /**
     * @param mixed $numeroLinea
     */
    public function setNumeroLinea()
    {
        $this->numeroLinea = $this->getNodeXml()->NumeroLinea;
    }

    /**
     * @return mixed
     */
    public function getTipoCessionePrestazione()
    {
        return $this->tipoCessionePrestazione;
    }

    /**
     * @param mixed $tipoCessionePrestazione
     */
    public function setTipoCessionePrestazione()
    {
        $this->tipoCessionePrestazione = $this->getNodeXml()->TipoCessionePrestazione;
    }

    /**
     * @return boolean
     */
    public function isCodiceArticoloIsPresente()
    {
        return $this->codiceArticoloIsPresente;
    }

    /**
     * @param boolean $codiceArticoloIsPresente
     */
    public function setCodiceArticoloIsPresente($codiceArticoloIsPresente)
    {
        $this->codiceArticoloIsPresente = $codiceArticoloIsPresente;
    }

    /**
     * @return array
     */
    public function getCodiciArticoli()
    {
        return $this->codiciArticoli;
    }

    /**
     * @param array $codiciArticoli
     */
    public function setCodiciArticoli()
    {
        $this->setCodiceArticoloIsPresente(true);
        foreach ( $this->getNodeXml()->CodiciArticoli  as $codiceArticolo) {
            $this->codiciArticoli[] = new FatturaElettronicaBodyCodiceArticoloClass($codiceArticolo);
        }
    }

    /**
     * @return mixed
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * @param mixed $descrizione
     */
    public function setDescrizione()
    {
        $this->descrizione = $this->getNodeXml()->Descrizione;
    }

    /**
     * @return mixed
     */
    public function getQuantita()
    {
        return $this->quantita;
    }

    /**
     * @param mixed $quantita
     */
    public function setQuantita()
    {
        $this->quantita = $this->getNodeXml()->Quantita;
    }

    /**
     * @return mixed
     */
    public function getUnitaMisura()
    {
        return $this->unitaMisura;
    }

    /**
     * @param mixed $unitaMisura
     */
    public function setUnitaMisura()
    {
        $this->unitaMisura = $this->getNodeXml()->UnitaMisura;
    }

    /**
     * @return mixed
     */
    public function getDataInizioPeriodo()
    {
        return $this->dataInizioPeriodo;
    }

    /**
     * @param mixed $dataInizioPeriodo
     */
    public function setDataInizioPeriodo()
    {
        $this->dataInizioPeriodo = $this->getNodeXml()->DataInizioPeriodo;
    }

    /**
     * @return mixed
     */
    public function getDataFinePeriodo()
    {
        return $this->dataFinePeriodo;
    }

    /**
     * @param mixed $dataFinePeriodo
     */
    public function setDataFinePeriodo()
    {
        $this->dataFinePeriodo = $this->getNodeXml()->DataFinePeriodo;
    }

    /**
     * @return mixed
     */
    public function getPrezzoUnitario()
    {
        return $this->prezzoUnitario;
    }

    /**
     * @param mixed $prezzoUnitario
     */
    public function setPrezzoUnitario()
    {
        $this->prezzoUnitario = $this->getNodeXml()->PrezzoUnitario;
    }

    /**
     * @return boolean
     */
    public function isScontoMaggiorazioneIsPresente()
    {
        return $this->scontoMaggiorazioneIsPresente;
    }

    /**
     * @param boolean $scontoMaggiorazioneIsPresente
     */
    public function setScontoMaggiorazioneIsPresente($scontoMaggiorazioneIsPresente)
    {
        $this->scontoMaggiorazioneIsPresente = $scontoMaggiorazioneIsPresente;
    }

    /**
     * @return array
     */
    public function getScontoMaggiorazione()
    {
        return $this->scontoMaggiorazione;
    }

    /**
     * @param array $scontoMaggiorazione
     */
    public function setScontoMaggiorazione()
    {
        $this->setScontoMaggiorazioneIsPresente(true);
        foreach ($this->getNodeXml()->ScontoMaggiorazione as $sconto ){
            $this->scontoMaggiorazione[] = $sconto; //TODO CLASS
        }
    }

    /**
     * @return mixed
     */
    public function getPrezzoTotale()
    {
        return $this->prezzoTotale;
    }

    /**
     * @param mixed $prezzoTotale
     */
    public function setPrezzoTotale()
    {
        $this->prezzoTotale = $this->getNodeXml()->PrezzoTotale;
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
    public function getRitenuta()
    {
        return $this->ritenuta;
    }

    /**
     * @param mixed $ritenuta
     */
    public function setRitenuta()
    {
        $this->ritenuta = $this->getNodeXml()->Ritenuta;
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
    public function getRiferimentoAmministrazione()
    {
        return $this->riferimentoAmministrazione;
    }

    /**
     * @param mixed $riferimentoAmministrazione
     */
    public function setRiferimentoAmministrazione()
    {
        $this->riferimentoAmministrazione = $this->getNodeXml()->RiferimentoAmministrazione;
    }

    /**
     * @return boolean
     */
    public function isAltriDatiGestionaleIsPresente()
    {
        return $this->altriDatiGestionaleIsPresente;
    }

    /**
     * @param boolean $altriDatiGestionaleIsPresente
     */
    public function setAltriDatiGestionaleIsPresente($altriDatiGestionaleIsPresente)
    {
        $this->altriDatiGestionaleIsPresente = $altriDatiGestionaleIsPresente;
    }

    /**
     * @return array
     */
    public function getAltriDatiGestionali()
    {
        return $this->altriDatiGestionali;
    }

    /**
     * @param array $altriDatiGestionali
     */
    public function setAltriDatiGestionali()
    {
        $this->altriDatiGestionali = $this->getNodeXml()->AltriDatiGestionali; //TODO CLASS
    }


}