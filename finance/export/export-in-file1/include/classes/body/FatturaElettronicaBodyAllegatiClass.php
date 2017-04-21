<?php

class FatturaElettronicaBodyAllegatiClass extends ExtensibleClass
{
    protected $nomeAttachment;
    protected $algoritmoCompressione;
    protected $formatoAttachment;
    protected $descrizioneAttachment;
    protected $attachment;
    
    function __construct($nodeXml)
    {
        $this->setNodeXml($nodeXml);
        $this->setAlgoritmoCompressione();
        $this->setAttachment();
        $this->setDescrizioneAttachment();
        $this->setDescrizioneAttachment();
        $this->setFormatoAttachment();
        $this->setNomeAttachment();
        
    }

    /**
     * @return mixed
     */
    public function getNomeAttachment()
    {
        return $this->nomeAttachment;
    }

    /**
     * @param mixed $nomeAttachment
     */
    public function setNomeAttachment()
    {
        $this->nomeAttachment = $this->getNodeXml()->NomeAttachment;
    }

    /**
     * @return mixed
     */
    public function getAlgoritmoCompressione()
    {
        return $this->algoritmoCompressione;
    }

    /**
     * @param mixed $algoritmoCompressione
     */
    public function setAlgoritmoCompressione()
    {
        $this->algoritmoCompressione = $this->getNodeXml()->AlgoritmoCompressione;
    }

    /**
     * @return mixed
     */
    public function getFormatoAttachment()
    {
        return $this->formatoAttachment;
    }

    /**
     * @param mixed $formatoAttachment
     */
    public function setFormatoAttachment()
    {
        $this->formatoAttachment = $this->getNodeXml()->FormatoAttachment;
    }

    /**
     * @return mixed
     */
    public function getDescrizioneAttachment()
    {
        return $this->descrizioneAttachment;
    }

    /**
     * @param mixed $descrizioneAttachment
     */
    public function setDescrizioneAttachment()
    {
        $this->descrizioneAttachment = $this->getNodeXml()->DescrizioneAttachment;
    }

    /**
     * @return mixed
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @param mixed $attachment
     */
    public function setAttachment()
    {
        $this->attachment = $this->getNodeXml()->Attachment;
    }
    
    
}