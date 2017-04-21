<?php

class FatturaElettronicaBodyDatiGeneraliClass
{
    protected $datiGeneraliDocumento;
    protected $datiGeneraliXml;
    protected $tipoDocumento;
    protected $divisa;
    protected $data;
    protected $numero;
    protected $tipoRitenuta;
    protected $importoRitenuta;
    protected $aliquotaRitenuta;
    protected $causalePagamento;
    protected $bolloVirtuale;
    protected $importoBollo;
    protected $datiCassaPrevidenziale = [];
    protected $scontoMaggiorazione =[];
    protected $importoTotaleDocumento = 0;
    protected $arrotondamento = 0;
    protected $causale = '';
    protected $art73;
    protected $datiOrdineAcquisto;
    protected $datiContratto;
    protected $datiConvenzione;
    protected $datiRicezione;
    protected $datiFattureCollegate;
    protected $datiSAL;
    protected $datiDDT;
    protected $datiTrasporto;
    protected $NumeroFatturaPrincipale;
    protected $DataFatturaPrincipale;
    protected $FatturaPrincipaleIsPresente = false;

    /**
     * FatturaElettronicaBodyDatiGeneraliClass constructor.
     */
    public function __construct(SimpleXMLElement $DatiGeneraliXml){
        if ($DatiGeneraliXml->getName() != 'DatiGenerali'){
            throw new FatturaElettronicaNodoErratoException($DatiGeneraliXml->getName());
        }
        $this->setDatiGeneraliXml($DatiGeneraliXml);
        $this->setDatiGeneraliDocumento($DatiGeneraliXml->DatiGeneraliDocumento);
        $this->setTipoDocumento();
        $this->setDatiRitenuta();
        $this->setScontoMaggiorazione();
        $this->setImportoTotaleDocumento();
        $this->setArrotondamento();
        $this->setCausale();
        $this->setArt73();
        if($this->getDatiGeneraliXml()->FatturaPrincipale){
            $this->setFatturaPrincipaleIsPresente(true);
            $this->setNumeroFatturaPrincipale();
            $this->setDataFatturaPrincipale();
        }

    }


    /**
     * @return mixed
     */
    public function getDatiGeneraliDocumento()
    {
        return $this->datiGeneraliDocumento;
    }

    /**
     * @param mixed $DatiGenerali
     */
    public function setDatiGeneraliDocumento($datiGeneraliDocumento)
    {
        $this->datiGeneraliDocumento = $datiGeneraliDocumento;
        $this->setTipoDocumento();
        $this->setDivisa();
        $this->setData();
        $this->setNumero();
        $this->setDatiRitenuta();
        $this->setDatiBollo();
        $this->setDatiContratto();
        $this->setDatiConvenzione();
        $this->setDatiFattureCollegate();
        $this->setDatiOrdineAcquisto();
        $this->setDatiRicezione();
        if ($this->getDatiGeneraliXml()->DatiDDT){
            $this->setDatiDDT();
        }
        if ($this->getDatiGeneraliXml()->DatiTrasporto){
            $this->setDatiTrasporto();
        }


    }

    /**
     * @return mixed
     */
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    public function getTipoDocumentoLabel(){
        $valori =[
            'TD01'  => 'fattura',
            'TD02'  => 'acconto/anticipo su fattura',
            'T03'  => 'acconto/anticipo su parcella',
            'TD04'  => 'nota di credito',
            'TD05'  => 'nota di debito',
            'TD06'  => 'parcella',
        ];

        return $valori[$this->getTipoDocumento()];
    }

    /**
     * @param mixed $tipoDocumento
     */
    public function setTipoDocumento()
    {
       $this->tipoDocumento = (string) $this->getDatiGeneraliDocumento()->TipoDocumento;
    }

    /**
     * @return mixed
     */
    public function getDivisa()
    {
        return $this->divisa;
    }

    /**
     * @param mixed $divisa
     */
    public function setDivisa()
    {
        $this->divisa = (string) $this->getDatiGeneraliDocumento()->Divisa;
    }

    /**
     * @return DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData()
    {
        $this->data = new DateTime( (string) $this->getDatiGeneraliDocumento()->Data);
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero()
    {
        $this->numero = (string) $this->getDatiGeneraliDocumento()->Numero;
    }

    /**
     * @return mixed
     */
    public function getDatiRitenuta()
    {
        return $this->datiRitenuta;
    }

    /**
     * @param mixed $datiRitenuta
     */
    public function setDatiRitenuta()
    {
        if ($this->getDatiGeneraliDocumento()->DatiRitenuta){
            $this->setTipoRitenuta($this->getDatiGeneraliDocumento()->DatiRitenuta);
            $this->setAliquotaRitenuta($this->getDatiGeneraliDocumento()->DatiRitenuta);
            $this->setImportoRitenuta($this->getDatiGeneraliDocumento()->DatiRitenuta);
            $this->setCausalePagamento($this->getDatiGeneraliDocumento()->DatiRitenuta);
        }
    }

    /**
     * @return mixed
     */
    public function getTipoRitenuta()
    {
        return $this->tipoRitenuta;
    }

    /**
     * @param mixed $datiRitenutaXml
     */
    public function setTipoRitenuta($datiRitenutaXml)
    {
        $this->tipoRitenuta = $datiRitenutaXml->TipoRitenuta;
    }

    /**
     * @return mixed
     */
    public function getImportoRitenuta()
    {
        return $this->importoRitenuta;
    }

    /**
     * @param mixed $datiRitenutaXml
     */
    public function setImportoRitenuta($datiRitenutaXml)
    {
        $this->importoRitenuta = (float) $datiRitenutaXml->ImportoRitenuta;
    }

    /**
     * @return mixed
     */
    public function getAliquotaRitenuta()
    {
        return $this->aliquotaRitenuta;
    }

    /**
     * @param mixed $aliquotaRitenuta
     */
    public function setAliquotaRitenuta($datiRitenutaXml)
    {
        $this->aliquotaRitenuta = (float) $datiRitenutaXml->AliquotaRitenuta;
    }

    /**
     * @return mixed
     */
    public function getCausalePagamento()
    {
        return $this->causalePagamento;
    }

    public function getCausalePagamentoLabel(){
        $valori = [
            "A"  => "prestazioni di lavoro autonomo rientranti nell'esercizio di arte o professione abituale;",
            "B"  => "utilizzazione economica, da parte dell'autore o dell'inventore, di opere dell'ingegno, di brevetti industriali e di processi, formule o informazioni relativi ad esperienze acquisite in campo industriale, commerciale o scientifico;",
            "C"  => "utili derivanti da contratti di associazione in partecipazione e da contratti di cointeressenza, quando l'apporto è costituito esclusivamente dalla prestazione di lavoro;",
            "D"  => "utili spettanti ai soci promotori ed ai soci fondatori delle società di capitali;",
            "E"  => "levata di protesti cambiari da parte dei segretari comunali;",
            "F"  => "prestazioni rese dagli sportivi con contratto di lavoro autonomo;",
            "G"  => "indennità corrisposte per la cessazione di attività sportiva professionale;",
            "H"  => "indennità corrisposte per la cessazione dei rapporti di agenzia delle persone fisiche e delle società di persone con esclusione delle somme maturate entro il 31 dicembre 2003, già imputate per competenza e tassate come reddito d'impresa;",
            "I"  => "indennità corrisposte per la cessazione da funzioni notarili;",
            "L"  => "utilizzazione economica, da parte di soggetto diverso dall'autore o dall'inventore, di opere dell'ingegno, di brevetti industriali e di processi, formule e informazioni relativi ad esperienze acquisite in campo industriale, commerciale o scientifico;",
            "M"  => "prestazioni di lavoro autonomo non esercitate abitualmente;",
            "N"  => "indennità di trasferta, rimborso forfetario di spese, premi e compensi erogati: nell'esercizio diretto di attività sportive dilettantistiche o in relazione a rapporti di collaborazione coordinata e continuativa di carattere amministrativo o gestionale di natura non professionale resi a favore di società e associazioni sportive dilettantistiche e di cori, bande e filodrammatiche da parte del direttore e dei collaboratori tecnici;",
            "P"  => "compensi corrisposti a soggetti non residenti privi di stabile organizzazione per l'uso o la concessione in uso di attrezzature industriali, commerciali o scientifiche che si trovano nel territorio dello Stato;",
            "Q"  => "provvigioni corrisposte ad agente o rappresentante di commercio monomandatario;",
            "R"  => "provvigioni corrisposte ad agente o rappresentante di commercio plurimandatario;",
            "S"  => "provvigioni corrisposte a commissionario;",
            "T"  => "provvigioni corrisposte a mediatore;",
            "U"  => "provvigioni corrisposte a procacciatore di affari;",
            "V"  => "provvigioni corrisposte a incaricato per le vendite a domicilio;",
            "W"  => "provvigioni corrisposte a incaricato per la vendita porta a porta e per la vendita ambulante di giornali quotidiani e periodici (L. 25 febbraio 1987, n. 67);",
            "X"  => "canoni corrisposti nel 2004 da società o enti residenti ovvero da stabili organizzazioni di società estere di cui all'art. 26-quater, comma 1, lett. a) e b) del DPR 600/73, a società o stabili organizzazioni di società, situate in altro stato membro dell'Unione Europea in presenza dei requisiti di cui al citato art. 26-quater, del DPR 600/73, per i quali è stato effettuato il rimborso della ritenuta ai sensi dell'art. 4 del D.Lgs. 30 maggio 2005 n. 143;",
            "Y"  => "canoni corrisposti dal 1° gennaio 2005 al 26 luglio 2005 da società o enti residenti ovvero da stabili organizzazioni di società estere di cui all'art. 26-quater, comma 1, lett. a) e b) del DPR n° 600 del 1973, a società o stabili organizzazioni di società, situate in altro stato membro dell'Unione Europea in presenza dei requisiti di cui al citato art. 26-quater, del DPR n° 600 del 1973, per i quali è stato effettuato il rimborso della ritenuta ai sensi dell'art. 4 del D.Lgs. 30 maggio 2005 n. 143;",
            "Z"  => "titolo diverso dai precedenti.",
            "L1"  => "titolo diverso dai precedenti.",
            "M1"  => "redditi derivanti dall'assunzione di obblighi di fare, di non fare o permettere.",
            "V1"  => "redditi derivanti da attività commerciali non esercitate abitualmente (ad esempio, provvigioni corrisposte per pre-
stazioni occasionali ad agente o rappresentante di commercio, mediatore, procacciatore d'affari o incaricato per
le vendite a domicilio)",
            "O1"  => "edditi derivanti dall'assunzione di obblighi di fare, di non fare o permettere, per le quali non sussiste l'obbligo di
iscrizione alla gestione separata (Circ. INPS n. 104/2001);",
        ];

         echo $valori[$this->getCausalePagamento()];
    }

    /**
     * @param mixed $datiRitenutaXml
     */
    public function setCausalePagamento($datiRitenutaXml)
    {
      $this->causalePagamento = (string) $datiRitenutaXml->CausalePagamento;
    }

    /**
     * @return mixed
     */
    public function getBolloVirtuale()
    {
        return $this->bolloVirtuale;
    }

    /**
     * @param mixed $bolloVirtuale
     */
    public function setBolloVirtuale(SimpleXMLElement $bolloVirtualeXml)
    {
        $this->bolloVirtuale = (string) $bolloVirtualeXml->BolloVirtuale;
    }

    /**
     * @return mixed
     */
    public function getDatiCassaPrevidenziale()
    {
        return $this->datiCassaPrevidenziale;
    }

    /**
     * @param mixed $datiCassaPrevidenziale
     */
    public function setDatiCassaPrevidenziale($datiCassaPrevidenziale)
    { foreach ($datiCassaPrevidenziale->DatiCassaPrevidenziale as $DatiCassaPrevidenzialeXml){
        $this->datiCassaPrevidenziale[] = new FatturaElettronicaBodyDatiCassaPrevidenzialeClass($DatiCassaPrevidenzialeXml);
    }
    }

    /**
     * @return mixed
     */
    public function getScontoMaggiorazione()
    {
        return $this->scontoMaggiorazione;
    }

    /**
     * @param mixed $scontoMaggiorazione
     */
    public function setScontoMaggiorazione()
    {
        foreach ($this->getDatiGeneraliDocumento()->ScontoMaggiorazione as $scontoMaggiorazioneXml){
        $this->scontoMaggiorazione[] = new FatturaElettronicaBodyScontoMaggiorazioneClass($scontoMaggiorazioneXml);
    }
    }

    /**
     * @return mixed
     */
    public function getImportoTotaleDocumento()
    {
        return $this->importoTotaleDocumento;
    }

    /**
     * @param mixed $importoTotaleDocumento
     */
    public function setImportoTotaleDocumento()
    {
        $this->importoTotaleDocumento = (float) $this->getDatiGeneraliDocumento()->ImportoTotaleDocumento;
    }

    /**
     * @return mixed
     */
    public function getArrotondamento()
    {
        return $this->arrotondamento;
    }

    /**
     * @param mixed $arrotondamento
     */
    public function setArrotondamento()
    {
        $this->arrotondamento = (float) $this->getDatiGeneraliDocumento()->Arrotondamento;
    }

    /**
     * @return mixed
     */
    public function getCausale()
    {
        return $this->causale;
    }

    /**
     * @param mixed $causale
     */
    public function setCausale()
    {
        foreach ( $this->getDatiGeneraliDocumento()->Causale as $causaleXml) {
            $this->causale .=  $causaleXml;
        }
    }

    /**
     * @return mixed
     */
    public function getArt73()
    {
        return $this->art73;
    }

    /**
     * @param mixed $art73
     */
    public function setArt73()
    {
        $this->art73 = (string) $this->getDatiGeneraliDocumento()->Art73;;
    }

    /**
     * @return SimpleXMLElement
     */
    public function getDatiGeneraliXml()
    {
        return $this->datiGeneraliXml;
    }

    /**
     * @param SimpleXMLElement $datiGeneraliXml
     */
    public function setDatiGeneraliXml(SimpleXMLElement $datiGeneraliXml)
    {
        $this->datiGeneraliXml = $datiGeneraliXml;
    }
    protected function setDatiBollo(){
        if ($this->getDatiGeneraliDocumento()->DatiBollo){
            $this->setBolloVirtuale($this->getDatiGeneraliDocumento()->DatiBollo);
            $this->setImportoBollo($this->getDatiGeneraliDocumento()->DatiBollo);
        }
    }
    /**
     * @return mixed
     */
    public function getImportoBollo()
    {
        return $this->importoBollo;
    }

    /**
     * @param mixed $bolloAssolto
     */
    public function setImportoBollo(SimpleXMLElement $datiBolloXml)
    {
        $this->importoBollo = (float) $datiBolloXml->ImportoBollo;
    }


    /**
     * @return mixed
     */
    public function getDatiOrdineAcquisto()
    {
        return $this->datiOrdineAcquisto;
    }

    /**
     * @param mixed $datiOrdineAcquisto
     */
    public function setDatiOrdineAcquisto()
    {
        if ($this->getDatiGeneraliXml()->DatiOrdineAcquisto){
        $this->datiOrdineAcquisto = new FatturaElettronicaBodyDatiContratto($this->getDatiGeneraliXml()->DatiOrdineAcquisto);
        }
    }

    /**
     * @return mixed
     */
    public function getDatiContratto()
    {
        return $this->datiContratto;
    }

    /**
     * @param mixed $datiContratto
     */
    public function setDatiContratto()
    {
        if ($this->getDatiGeneraliXml()->DatiContratto){
            $this->datiContratto = new FatturaElettronicaBodyDatiContratto($this->getDatiGeneraliXml()->DatiContratto);
        }
    }

    /**
     * @return mixed
     */
    public function getDatiConvenzione()
    {
        return $this->datiConvenzione;
    }

    /**
     * @param mixed $datiConvenzione
     */
    public function setDatiConvenzione()
    {

        if ($this->getDatiGeneraliXml()->DatiConvenzione){
            $this->datiConvenzione = new FatturaElettronicaBodyDatiContratto($this->getDatiGeneraliXml()->DatiConvenzione);
        }
    }

    /**
     * @return mixed
     */
    public function getDatiRicezione()
    {
        return $this->datiRicezione;
    }

    /**
     * @param mixed $datiRicezione
     */
    public function setDatiRicezione()
    {

        if ($this->getDatiGeneraliXml()->DatiRicezione){
            $this->datiRicezione = new FatturaElettronicaBodyDatiContratto($this->getDatiGeneraliXml()->DatiRicezione);
        }
    }

    /**
     * @return mixed
     */
    public function getDatiFattureCollegate()
    {
        return $this->datiFattureCollegate;
    }

    /**
     * @param mixed $datiFattureCollegate
     */
    public function setDatiFattureCollegate()
    {
        if ($this->getDatiGeneraliXml()->DatiFattureCollegate){
            $this->datiFattureCollegate = new FatturaElettronicaBodyDatiContratto($this->getDatiGeneraliXml()->DatiFattureCollegate);
        }
    }

    /**
     * @return mixed
     */
    public function getDatiSAL()
    {
        return $this->datiSAL;
    }
    /**
     * @param mixed $datiSAL
     */
    public function setDatiSAL()
    {
        if ($this->getDatiGeneraliXml()->DatiSAL){
            $this->datiSAL = $this->getDatiGeneraliXml()->DatiSAL->RiferimentoFase;
        }
    }

    /**
     * @return mixed
     */
    public function getDatiDDT()
    {
        return $this->datiDDT;
    }

    /**
     * @param mixed $datiDDT
     */
    public function setDatiDDT()
    {
        $this->datiDDT = new FatturaElettronicaBodyDDT($this->getDatiGeneraliXml()->DatiDDT);
    }



    /**
     * @return mixed
     */
    public function getDatiTrasporto()
    {
        return $this->datiTrasporto;
    }

    /**
     * @param mixed $datiDDT
     */
    public function setDatiTrasporto()
    {
        $this->datiTrasporto = new FatturaElettronicaBodyDatiTrasportoClass($this->getDatiGeneraliXml()->DatiTrasporto);
    }

    /**
     * @return mixed
     */
    public function getNumeroFatturaPrincipale()
    {
        return $this->NumeroFatturaPrincipale;
    }

    /**
     * @param mixed $NumeroFatturaPrincipale
     */
    public function setNumeroFatturaPrincipale()
    {
        $this->NumeroFatturaPrincipale = $this->getDatiGeneraliXml()->FatturaPrincipale->NumeroFatturaPrincipale;
    }

    /**
     * @return boolean
     */
    public function isFatturaPrincipaleIsPresente()
    {
        return $this->FatturaPrincipaleIsPresente;
    }

    /**
     * @param boolean $FatturaPrincipaleIsPresente
     */
    public function setFatturaPrincipaleIsPresente($FatturaPrincipaleIsPresente)
    {
        $this->FatturaPrincipaleIsPresente = $FatturaPrincipaleIsPresente;
    }

    /**
     * @return mixed
     */
    public function getDataFatturaPrincipale()
    {
        return $this->DataFatturaPrincipale;
    }

    /**
     * @param mixed $DataFatturaPrincipale
     */
    public function setDataFatturaPrincipale()
    {
        $this->DataFatturaPrincipale = $this->getDatiGeneraliXml()->FatturaPrincipale->DataFatturaPrincipale;
    }



}