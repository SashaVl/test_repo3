<?php

Class FatturaContattoClass {
    protected $tipo;
    protected $valore;
    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getValore()
    {
        return $this->valore;
    }

    /**
     * @param mixed $valore
     */
    public function setValore($valore)
    {
        $this->valore = $valore;
    }
}