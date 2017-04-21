<?php

class FatturaAnagraficaReaClass {
    protected  $ufficio;
    protected $numeroRea;
    protected $capitaleSociale;
    protected $SocioUnico;
    protected $statoLiquidazione;

    /**
     * @return mixed
     */
    public function getUfficio()
    {
        return $this->ufficio;
    }

    /**
     * @param mixed $ufficio
     */
    public function setUfficio($ufficio)
    {
        $this->ufficio = $ufficio;
    }

    /**
     * @return mixed
     */
    public function getNumeroRea()
    {
        return $this->numeroRea;
    }

    /**
     * @param mixed $numeroRea
     */
    public function setNumeroRea($numeroRea)
    {
        $this->numeroRea = $numeroRea;
    }

    /**
     * @return mixed
     */
    public function getCapitaleSociale()
    {
        return $this->capitaleSociale;
    }

    /**
     * @param mixed $capitaleSociale
     */
    public function setCapitaleSociale($capitaleSociale)
    {
        $this->capitaleSociale = $capitaleSociale;
    }

    /**
     * @return mixed
     */
    public function getSocioUnico()
    {
        return $this->SocioUnico;
    }

    /**
     * @param mixed $SocioUnico
     */
    public function setSocioUnico($SocioUnico)
    {
        $this->SocioUnico = $SocioUnico;
    }

    /**
     * @return mixed
     */
    public function getStatoLiquidazione()
    {
        return $this->statoLiquidazione;
    }

    /**
     * @param mixed $statoLiquidazione
     */
    public function setStatoLiquidazione($statoLiquidazione)
    {
        $this->statoLiquidazione = $statoLiquidazione;
    }
}