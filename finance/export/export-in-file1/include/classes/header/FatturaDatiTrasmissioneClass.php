<?php
class FatturaDatiTrasmissioneClass {
    protected $progressivoInvio;
    protected $formatoTrasmissione;
    protected $codiceDestinatario;
    protected $nazioneTrasmittente;
    protected $codiceTrasmittente;
    protected $contatti = [];

    function __construct(SimpleXMLElement $datiTrasmissioneXml){
        if ($datiTrasmissioneXml->getName() != 'DatiTrasmissione'){
            throw new FatturaElettronicaNodoErratoException($datiTrasmissioneXml->getName());
        }

        $this->setCodiceDestinatario($datiTrasmissioneXml->CodiceDestinatario->text);
        $this->setProgressivoInvio($datiTrasmissioneXml->ProgressivoInvio->text);
        $this->setFormatoTrasmissione($datiTrasmissioneXml->FormatoTrasmissione->text);
        $this->setNazioneTrasmittente($datiTrasmissioneXml->IdTrasmittente->IdPaese->text);
        $this->setCodiceTrasmittente($datiTrasmissioneXml->IdTrasmittente->IdCodice->text);

        if ( $datiTrasmissioneXml->ContattiTrasmittente->Telefono ){
            $this->contatti['telefono'] = new FatturaTelefonoClass($datiTrasmissioneXml->ContattiTrasmittente->Telefono->text);
        }
        if ( $datiTrasmissioneXml->ContattiTrasmittente->Email ) {
            $this->contatti['email'] = new FatturaEmailClass($datiTrasmissioneXml->ContattiTrasmittente->Email->text);
        }
    }
    /**
     * @return mixed
     */
    public function getProgressivoInvio()
    {
        return $this->progressivoInvio;
    }

    /**
     * @param mixed $progressivoInvio
     */
    public function setProgressivoInvio($progressivoInvio)
    {
        $this->progressivoInvio = $progressivoInvio;
    }

    /**
     * @return mixed
     */
    public function getFormatoTrasmissione()
    {
        return $this->formatoTrasmissione;
    }

    /**
     * @param mixed $formatoTrasmissione
     */
    public function setFormatoTrasmissione($formatoTrasmissione)
    {
        $this->formatoTrasmissione = $formatoTrasmissione;
    }

    /**
     * @return mixed
     */
    public function getCodiceDestinatario()
    {
        return $this->codiceDestinatario;
    }

    /**
     * @param mixed $codiceDestinatario
     */
    public function setCodiceDestinatario($codiceDestinatario)
    {
        $this->codiceDestinatario = $codiceDestinatario;
    }

    /**
     * @return mixed
     */
    public function getNazioneTrasmittente()
    {
        return $this->nazioneTrasmittente;
    }

    /**
     * @param mixed $nazioneTrasmittente
     */
    public function setNazioneTrasmittente($nazioneTrasmittente)
    {
        $this->nazioneTrasmittente = $nazioneTrasmittente;
    }

    /**
     * @return mixed
     */
    public function getCodiceTrasmittente()
    {
        return $this->codiceTrasmittente;
    }

    /**
     * @param mixed $codiceTrasmittente
     */
    public function setCodiceTrasmittente($codiceTrasmittente)
    {
        $this->codiceTrasmittente = $codiceTrasmittente;
    }
}