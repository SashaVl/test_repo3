<?php
Class FatturaElettronicaClass {

    protected $file;
    protected $fatturaXml;
    protected $trasmittente;
    protected $mittente;
    protected $prestatore;
    protected $datiInvio;
    protected $header;
    protected $body = [];
    protected $footer;
    protected $multipla= false;

    function __construct($file){
        if ( !file_exists($file) ){
            throw new FatturaElettronicaException('File non esistente');
        }

            $this->file = $file;
            $this->caricaXml();
            $this->setMultipla();
            $this->setHeader( );
            $this->setBody();
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    protected function CaricaXml() {
        if ( pathinfo($this->file, PATHINFO_EXTENSION) != 'xml'){
            throw new FatturaElettronicaException('File non xml');
        }
//        $p = new DOMDocument();
//        $p->load($this->file);
//        $schema = __DIR__ . '../../../assets/fatturapa_v1.1.xsd';
//        $p->schemaValidate($schema);
        $this->fatturaXml = simplexml_load_file($this->file);
        if ( !$this->fatturaXml->FatturaElettronicaHeader ){
            throw new FatturaElettronicaException('Il File non&egrave; una fattura');
        }
    }


    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     *
     */
    public function setHeader()
    {
        $this->header = new FatturaElettronicaHeader( $this->fatturaXml->FatturaElettronicaHeader );
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody()
    {
        foreach ($this->fatturaXml->FatturaElettronicaBody as $bodyFattura){
            $this->body[] = new FatturaElettronicaBody($bodyFattura);
        }
    }

    /**
     * @return mixed
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param mixed $footer
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
    }

    /**
     * @return boolean
     */
    public function isMultipla()
    {
        return $this->multipla;
    }

    /**
     * @param boolean $multipla
     */
    public function setMultipla()
    {
       if (count( $this->fatturaXml->FatturaElettronicaBody ) > 1){
           $this->multipla = true;
       }
    }
}