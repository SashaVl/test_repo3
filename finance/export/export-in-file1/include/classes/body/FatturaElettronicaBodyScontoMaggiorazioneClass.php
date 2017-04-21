<?php

class FatturaElettronicaBodyScontoMaggiorazioneClass extends ExtensibleClass
{
    protected $tipo;
    protected $importo;
    protected $percentuale;
    protected $scontoMaggiorazioneXml;
    /**
     * FatturaElettronicaBodyDatiGeneraliClass constructor.
     */
    public function __construct(SimpleXMLElement $scontoMaggiorazioneXml){
        $this->setNodeXml($scontoMaggiorazioneXml);
        $this->check('ScontoMaggiorazione');
        $this->setTipo();
        $this->checkIfExistAndSet('Importo');
        $this->checkIfExistAndSet('Percentuale');
    }


    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    public function getTipoLabel(){
        $valori = [
            "SC" => "Sconto",
            "MG02" => "Maggiorazione",
        ];

        return $valori[$this->getTipo()];
    }
    /**
     * @param mixed $tipoCassa
     */
    public function setTipo()
    {
        $this->tipo = (string) $this->getNodeXml()->Tipo;
    }

    /**
     * @return mixed
     */
    public function getImporto()
    {
        return $this->importo;
    }

    /**
     * @param mixed $alCassa
     */
    public function setImporto()
    {
        $this->importo = (float) $this->getNodeXml()->Importo;
    }

    /**
     * @return mixed
     */
    public function getPercentuale()
    {
        return $this->percentuale;
    }

    /**
     * @param mixed $importoContributoCassa
     */
    public function setPercentuale()
    {
        $this->percentuale = (float) $this->getNodeXml()->Percentuale;
    }

}