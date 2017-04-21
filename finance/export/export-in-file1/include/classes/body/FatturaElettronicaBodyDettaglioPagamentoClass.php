<?php

class FatturaElettronicaBodyDettaglioPagamentoClass extends ExtensibleClass
{
    protected $beneficiario;
    protected $modalitaPagamento;
    protected $importoPagamento;
    protected $dataRiferimentoTerminePagamento;
    protected $giorniTerminiPagamento;
    protected $DataScadenzaPagamento;
    protected $codUfficioPostale;
    protected $cognomeQuietanzante;
    protected $nomeQuietanzante;
    protected $cfQuietanzante;
    protected $titoloQuietanzante;
    protected $istitutoFinanziario;
    protected $iban;
    protected $abi;
    protected $cab;
    protected $bic;
    protected $scontoPagamentoAnticipato;
    protected $dataLimeitePagamentoAnticipato;
    protected $penalitaPagamentiRitardati;
    protected $dataDecorrenzaPenale;
    protected $codicePagamento;


    function __construct($nodeXml)
    {
        $this->setNodeXml($nodeXml);
        $this->check('DettaglioPagamento');

        $this->checkIfExistAndSet('Beneficiario');
        $this->setModalitaPagamento();
        $this->setImportoPagamento();
        $this->checkIfExistAndSet('DataRiferimentoTerminiPagamento');
        $this->checkIfExistAndSet('GiorniTerminiPagamento');
        $this->checkIfExistAndSet('DataScadenzaPagamento');
        $this->checkIfExistAndSet('CodUfficioPostale');
        $this->checkIfExistAndSet('CognomeQuietanzante');
        $this->checkIfExistAndSet('NomeQuietanzante');
        $this->checkIfExistAndSet('CFQuitenzante');
        $this->checkIfExistAndSet('TitoloQuietanzante');
        $this->checkIfExistAndSet('IstitutoFinanziario');
        $this->checkIfExistAndSet('IBAN');
        $this->checkIfExistAndSet('ABI');
        $this->checkIfExistAndSet('CAB');
        $this->checkIfExistAndSet('BIC');
        $this->checkIfExistAndSet('ScontoPagamentoAnticipato');
        $this->checkIfExistAndSet('DataLimitePagamentoAnticipato');
        $this->checkIfExistAndSet('PenalitaPagamentiRitardati');
        $this->checkIfExistAndSet('DataDecorrenzaPenale');
        $this->checkIfExistAndSet('CodicePagamento');

    }

    /**
     * @return mixed
     */
    public function getBeneficiario()
    {
        return $this->beneficiario;
    }

    /**
     * @param mixed $beneficiario
     */
    public function setBeneficiario()
    {
        $this->beneficiario = $this->getNodeXml()->Beneficiario;
    }

    /**
     * @return mixed
     */
    public function getModalitaPagamento()
    {
        return $this->modalitaPagamento;
    }

    /**
     * @param mixed $modalitaPagamento
     */
    public function setModalitaPagamento()
    {
        $this->modalitaPagamento = $this->getNodeXml()->ModalitaPagamento;
    }


    /**
     * @return mixed
     */
    public function getImportoPagamento()
    {
        return $this->importoPagamento;
    }

    /**
     * @param mixed $modalitaPagamento
     */
    public function setImportoPagamento()
    {
        $this->importoPagamento = $this->getNodeXml()->ImportoPagamento;
    }

    /**
     * @return mixed
     */
    public function getDataRiferimentoTerminePagamento()
    {
        return $this->dataRiferimentoTerminePagamento;
    }

    /**
     * @param mixed $dataRiferimentoTerminePagamento
     */
    public function setDataRiferimentoTerminePagamento()
    {
        $this->dataRiferimentoTerminePagamento = $this->getNodeXml()->DataRiferimentoTerminePagamento;
    }

    /**
     * @return mixed
     */
    public function getGiorniTerminiPagamento()
    {
        return $this->giorniTerminiPagamento;
    }

    /**
     * @param mixed $giorniTerminiPagamento
     */
    public function setGiorniTerminiPagamento()
    {
        $this->giorniTerminiPagamento = $this->getNodeXml()->GiorniTerminiPagamento;
    }

    /**
     * @return mixed
     */
    public function getDataScadenzaPagamento()
    {
        return $this->DataScadenzaPagamento;
    }

    /**
     * @param mixed $DataScadenzaPagamento
     */
    public function setDataScadenzaPagamento()
    {
        $this->DataScadenzaPagamento = $this->getNodeXml()->DataScadenzaPagamento;
    }

    /**
     * @return mixed
     */
    public function getCodUfficioPostale()
    {
        return $this->codUfficioPostale;
    }

    /**
     * @param mixed $codUfficioPostale
     */
    public function setCodUfficioPostale()
    {
        $this->codUfficioPostale = $this->getNodeXml()->CodUfficioPostale;
    }

    /**
     * @return mixed
     */
    public function getCognomeQuietanzante()
    {
        return $this->cognomeQuietanzante;
    }

    /**
     * @param mixed $cognomeQuietanzante
     */
    public function setCognomeQuietanzante()
    {
        $this->cognomeQuietanzante = $this->getNodeXml()->CognomeQuietanzante;
    }

    /**
     * @return mixed
     */
    public function getNomeQuietanzante()
    {
        return $this->nomeQuietanzante;
    }

    /**
     * @param mixed $nomeQuietanzante
     */
    public function setNomeQuietanzante()
    {
        $this->nomeQuietanzante = $this->getNodeXml()->NomeQuietanzante;
    }

    /**
     * @return mixed
     */
    public function getCfQuietanzante()
    {
        return $this->cfQuietanzante;
    }

    /**
     * @param mixed $cfQuietanzante
     */
    public function setCfQuietanzante()
    {
        $this->cfQuietanzante = $this->getNodeXml()->CFQuietanzante;
    }

    /**
     * @return mixed
     */
    public function getTitoloQuietanzante()
    {
        return $this->titoloQuietanzante;
    }

    /**
     * @param mixed $titoloQuietanzante
     */
    public function setTitoloQuietanzante()
    {
        $this->titoloQuietanzante = $this->getNodeXml()->TitoloQuietanzante;
    }

    /**
     * @return mixed
     */
    public function getIstitutoFinanziario()
    {
        return $this->istitutoFinanziario;
    }

    /**
     * @param mixed $istitutoFinanziario
     */
    public function setIstitutoFinanziario()
    {
        $this->istitutoFinanziario = $this->getNodeXml()->IstitutoFinanziario;
    }

    /**
     * @return mixed
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param mixed $iban
     */
    public function setIban()
    {
        $this->iban = $this->getNodeXml()->IBAN;
    }

    /**
     * @return mixed
     */
    public function getAbi()
    {
        return $this->abi;
    }

    /**
     * @param mixed $abi
     */
    public function setAbi()
    {
        $this->abi = $this->getNodeXml()->ABI;
    }

    /**
     * @return mixed
     */
    public function getCab()
    {
        return $this->cab;
    }

    /**
     * @param mixed $cab
     */
    public function setCab()
    {
        $this->cab = $this->getNodeXml()->CAB;
    }

    /**
     * @return mixed
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param mixed $bic
     */
    public function setBic()
    {
        $this->bic = $this->getNodeXml()->BIC;
    }

    /**
     * @return mixed
     */
    public function getScontoPagamentoAnticipato()
    {
        return $this->scontoPagamentoAnticipato;
    }

    /**
     * @param mixed $scontoPagamentoAnticipato
     */
    public function setScontoPagamentoAnticipato()
    {
        $this->scontoPagamentoAnticipato = $this->getNodeXml()->ScontoPagamentoAnticipato;
    }

    /**
     * @return mixed
     */
    public function getDataLimeitePagamentoAnticipato()
    {
        return $this->dataLimeitePagamentoAnticipato;
    }

    /**
     * @param mixed $dataLimeitePagamentoAnticipato
     */
    public function setDataLimeitePagamentoAnticipato()
    {
        $this->dataLimeitePagamentoAnticipato = $this->getNodeXml()->DataLimeitePagamentoAnticipato;
    }

    /**
     * @return mixed
     */
    public function getPenalitaPagamentiRitardati()
    {
        return $this->penalitaPagamentiRitardati;
    }

    /**
     * @param mixed $penalitaPagamentiRitardati
     */
    public function setPenalitaPagamentiRitardati()
    {
        $this->penalitaPagamentiRitardati = $this->getNodeXml()->PenalitaPagamentiRitardati;
    }

    /**
     * @return mixed
     */
    public function getDataDecorrenzaPenale()
    {
        return $this->dataDecorrenzaPenale;
    }

    /**
     * @param mixed $dataDecorrenzaPenale
     */
    public function setDataDecorrenzaPenale()
    {
        $this->dataDecorrenzaPenale = $this->getNodeXml()->DataDecorrenzaPenale;
    }

    /**
     * @return mixed
     */
    public function getCodicePagamento()
    {
        return $this->codicePagamento;
    }

    /**
     * @param mixed $codicePagamento
     */
    public function setCodicePagamento()
    {
        $this->codicePagamento = $this->getNodeXml()->CodicePagamento;
    }



}