<?php

class FatturaElettronicaBodyDatiCassaPrevidenzialeClass
{
    protected $tipoCassa;
    protected $alCassa;
    protected $importoContributoCassa;
    protected $imponibileCassa;
    protected $aliquotaIVA;
    protected $ritenuta;
    protected $natura;
    protected $riferimentoAmministrazione;
    protected $datiCassaPrevidenzialeXml;

    /**
     * FatturaElettronicaBodyDatiGeneraliClass constructor.
     */
    public function __construct(SimpleXMLElement $datiCassaPrevidenzialeXml){
        if ($datiCassaPrevidenzialeXml->getName() != 'DatiCassaPrevidenziale'){
            throw new FatturaElettronicaNodoErratoException($datiCassaPrevidenzialeXml->getName());
        }
        $this->setDatiCassaPrevidenzialeXml($datiCassaPrevidenzialeXml);
        $this->setTipoCassa();
        $this->setAlCassa();
        $this->setImportoContributoCassa();
        $this->setImponibileCassa();
        $this->setAliquotaIVA();
        $this->setRitenuta();
        $this->setNatura();
        $this->setRiferimentoAmministrazione();
    }

    /**
     * @return mixed
     */
    public function getDatiCassaPrevidenzialeXml()
    {
        return $this->datiCassaPrevidenzialeXml;
    }

    /**
     * @param mixed $datiCassaPrevidenzialeXml
     */
    public function setDatiCassaPrevidenzialeXml($datiCassaPrevidenzialeXml)
    {
        $this->datiCassaPrevidenzialeXml = $datiCassaPrevidenzialeXml;
    }

    /**
     * @return mixed
     */
    public function getTipoCassa()
    {
        return $this->tipoCassa;
    }

    public function getTipoCassaLabel(){
        $valori = [
            "TC01" => "Cassa nazionale previdenza e assistenza avvocati e procuratori legali",
            "TC02" => "Cassa previdenza dottori commercialisti",
            "TC03" => "Cassa previdenza e assistenza geometri",
            "TC04" => "Cassa nazionale previdenza e assistenza ingegneri e architetti liberi professionisti",
            "TC05" => "Cassa nazionale del notariato",
            "TC06" => "Cassa nazionale previdenza e assistenza ragionieri e periti commerciali",
            "TC07" => "Ente nazionale assistenza agenti e rappresentanti di commercio (ENASARCO)",
            "TC08" => "Ente nazionale previdenza e assistenza consulenti del lavoro (ENPACL)",
            "TC09" => "Ente nazionale previdenza e assistenza medici (ENPAM)",
            "TC10" => "Ente nazionale previdenza e assistenza farmacisti (ENPAF)",
            "TC11" => "Ente nazionale previdenza e assistenza veterinari (ENPAV)",
            "TC12" => "Ente nazionale previdenza e assistenza impiegati dell'agricoltura (ENPAIA)",
            "TC13" => "Fondo previdenza impiegati imprese di spedizione e agenzie marittime",
            "TC14" => "Istituto nazionale previdenza giornalisti italiani (INPGI)",
            "TC15" => "Opera nazionale assistenza orfani sanitari italiani (ONAOSI)",
            "TC16" => "Cassa autonoma assistenza integrativa giornalisti italiani (CASAGIT)",
            "TC17" => "Ente previdenza periti industriali e periti industriali laureati (EPPI)",
            "TC18" => "Ente previdenza e assistenza pluricategoriale (EPAP)",
            "TC19" => "Ente nazionale previdenza e assistenza biologi (ENPAB)",
            "TC20" => "Ente nazionale previdenza e assistenza professione infermieristica (ENPAPI)",
            "TC21" => "Ente nazionale previdenza e assistenza psicologi (ENPAP)",
            "TC22" => "INPS",
        ];

        return $valori[$this->getTipoCassa()];
    }
    /**
     * @param mixed $tipoCassa
     */
    public function setTipoCassa()
    {
        $this->tipoCassa = (string) $this->getDatiCassaPrevidenzialeXml()->TipoCassa;
    }

    /**
     * @return mixed
     */
    public function getAlCassa()
    {
        return $this->alCassa;
    }

    /**
     * @param mixed $alCassa
     */
    public function setAlCassa()
    {
        $this->alCassa = (float) $this->getDatiCassaPrevidenzialeXml()->AlCassa;;
    }

    /**
     * @return mixed
     */
    public function getImportoContributoCassa()
    {
        return $this->importoContributoCassa;
    }

    /**
     * @param mixed $importoContributoCassa
     */
    public function setImportoContributoCassa()
    {
        $this->importoContributoCassa = (float) $this->getDatiCassaPrevidenzialeXml()->ImportoContributoCassa;;
    }

    /**
     * @return mixed
     */
    public function getImponibileCassa()
    {
        return $this->imponibileCassa;
    }

    /**
     * @param mixed $imponibileCassa
     */
    public function setImponibileCassa()
    {
        $this->imponibileCassa = (float) $this->getDatiCassaPrevidenzialeXml()->ImponibileCassa;;
    }

    /**
     * @return mixed
     */
    public function getAliquotaIVA()
    {
        return $this->aliquotaIVA;
    }

    /**
     * @param mixed $aliquotaIVA
     */
    public function setAliquotaIVA()
    {
        $this->aliquotaIVA = (float) $this->getDatiCassaPrevidenzialeXml()->AliquotaIVA;;
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
        $this->ritenuta = (string) $this->getDatiCassaPrevidenzialeXml()->Ritenuta;;
    }

    /**
     * @return mixed
     */
    public function getNatura()
    {
        return $this->natura;
    }
    
    public function getNaturaLabel(){
        $valori = [
            "N1" => "escluse ex art. 15",
            "N2" => "non soggette",
            "N3" => "non imponibili",
            "N4" => "esenti",
            "N5" => "regime del margine",
            "N6" => "inversione contabile (reverse charge)",
        ];
        
        return $valori[$this->getNatura()];
    }

    /**
     * @param mixed $natura
     */
    public function setNatura()
    {
        $this->natura = (string) $this->getDatiCassaPrevidenzialeXml()->Natura;;
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
        $this->riferimentoAmministrazione = (string) $this->getDatiCassaPrevidenzialeXml()->RiferimentoAmministrazione;
    }

}