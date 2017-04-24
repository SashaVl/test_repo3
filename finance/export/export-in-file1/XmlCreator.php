<?php
class XmlCreator{
    public static function GenXml($dat_)
    {
        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;
        $domx = $dom->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="(File per visualizzazione FatturaPA 1.2 - NON inviare).xsl"');
        $dom->appendChild($domx);

        /*
         * тег "FatturaElettronica"
         * $attr1 (2,3) - атрибути теги "FatturaElettronica"
         * $tNode - текст атрибутів
         */


        $FatturaElettronica = $dom->createElement("p:FatturaElettronica");

        $attr1 = $dom->createAttribute("versione");
        $tNode = $dom->createTextNode("FPA12");
        $attr1->appendChild($tNode);
        $attr2 = $dom->createAttribute("xmlns:p");
        $tNode = $dom->createTextNode("http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2");
        $attr2->appendChild($tNode);
        $attr3 = $dom->createAttribute("xmlns:ds");
        $tNode = $dom->createTextNode("http://www.w3.org/2000/09/xmldsig#");
        $attr3->appendChild($tNode);
        $FatturaElettronica->appendChild($attr1);
        $FatturaElettronica->appendChild($attr2);
        $FatturaElettronica->appendChild($attr3);

        /*
         * тег "FatturaElettronicaHeader" sub FatturaElettronicas
         */

        $FatturaElettronicaHeader = $dom->createElement("FatturaElettronicaHeader");

        /*
         * тег "DatiTrasmissione" sub "FatturaElettronicaHeader"
         */

        $DatiTrasmissione = $dom->createElement("DatiTrasmissione");

        /*
         * тег "IdTrasmittente" sub "DatiTrasmissione"
         */

        $IdTrasmittente = $dom->createElement("IdTrasmittente");

        /*
         *  тег "IdPaese" sub "IdTrasmittente"
         *  $tNode - текст теги "IdPaese"
         */

        $IdPaese = $dom->createElement("IdPaese");
        $tNode = $dom->createTextNode($dat_['IdPaese']);
        $IdPaese->appendChild($tNode);
        $IdTrasmittente->appendChild($IdPaese);
        /*
         *  тег "IdCodice" sub "IdTrasmittente"
         *  $tNode - текст теги "IdCodice"
         */

        $IdCodice = $dom->createElement("IdCodice");
        $tNode = $dom->createTextNode($dat_['idCodice']);
        $IdCodice->appendChild($tNode);
        $IdTrasmittente->appendChild($IdCodice);

        $DatiTrasmissione->appendChild($IdTrasmittente);

        /*
         *  тег "ProgressivoInvio" sub "DatiTrasmissione"
         *  $tNode - текст теги "ProgressivoInvio"
         */

        $ProgressivoInvio = $dom->createElement("ProgressivoInvio");
        $tNode = $dom->createTextNode($dat_['progressivoInvio']);
        $ProgressivoInvio->appendChild($tNode);

        $DatiTrasmissione->appendChild($ProgressivoInvio);

        /*
         *  тег "FormatoTrasmissione" sub "DatiTrasmissione"
         *  $tNode - текст теги "FormatoTrasmissione"
         */

        $FormatoTrasmissione = $dom->createElement("FormatoTrasmissione");
        $tNode = $dom->createTextNode($dat_['FormatoTrasmissione']);
        $FormatoTrasmissione->appendChild($tNode);

        $DatiTrasmissione->appendChild($FormatoTrasmissione);

        /*
         *  тег "CodiceDestinatario" sub "DatiTrasmissione"
         *  $tNode - текст теги "CodiceDestinatario"
         */

        $CodiceDestinatario = $dom->createElement("CodiceDestinatario");
        $tNode = $dom->createTextNode($dat_['CodiceDestinatario']);
        $CodiceDestinatario->appendChild($tNode);
        $DatiTrasmissione->appendChild($CodiceDestinatario);
        $FatturaElettronicaHeader->appendChild($DatiTrasmissione);

        /*
        * закрита тега DatiTrasmissione
        */
        /*
         * тег "CedentePrestatore" sub "FatturaElettronicaHeader"
         */
        $CedentePrestatore = $dom->createElement("CedentePrestatore");
        /*
         * тег "DatiAnagrafici" sub "CedentePrestatore"
         */
        $DatiAnagrafici = $dom->createElement("DatiAnagrafici");
        /*
         * тег "IdFiscaleIVA" sub "DatiAnagrafici"
         */
        $IdFiscaleIVA = $dom->createElement("IdFiscaleIVA");

        $IdPaese = $dom->createElement("IdPaese");
        $tNode = $dom->createTextNode($dat_['IdPaese']);
        $IdPaese->appendChild($tNode);

        $IdCodice = $dom->createElement("IdCodice");
        $tNode = $dom->createTextNode($dat_['idCodice']);
        $IdCodice->appendChild($tNode);

        $IdFiscaleIVA->appendChild($IdPaese);
        $IdFiscaleIVA->appendChild($IdCodice);
        $DatiAnagrafici->appendChild($IdFiscaleIVA);

        /*
         * тег "CodiceFiscale" sub "DatiAnagrafici"
         */

        $CodiceFiscale = $dom->createElement("CodiceFiscale");
        $tNode = $dom->createTextNode($dat_['CodiceFiscale']);
        $CodiceFiscale->appendChild($tNode);
        $DatiAnagrafici->appendChild($CodiceFiscale);
        /*
         * тег "Anagrafica" sub "DatiAnagrafici"
         */
        $Anagrafica = $dom->createElement("Anagrafica");
        /*
         * тег "Denominazione" sub "Anagrafica"
         */
        $Denominazione = $dom->createElement("Denominazione");
        $tNode = $dom->createTextNode($dat_['DenominazioneSeller']);
        $Denominazione->appendChild($tNode);
        $Anagrafica->appendChild($Denominazione);
        $DatiAnagrafici->appendChild($Anagrafica);

        /*
         * тег "RegimeFiscale" sub "DatiAnagrafici"
         */
        $RegimeFiscale = $dom->createElement("RegimeFiscale");
        $tNode = $dom->createTextNode($dat_['RegimeFiscale']);
        $RegimeFiscale->appendChild($tNode);
        $DatiAnagrafici->appendChild($RegimeFiscale);
        $CedentePrestatore->appendChild($DatiAnagrafici);

        /*
         * тег "Sede" sub "CedentePrestatore"
         */

        $Sede = $dom->createElement("Sede");
        $Indirizzo = $dom->createElement("Indirizzo");
        $tNode = $dom->createTextNode($dat_['IndirizzoSeller']);
        $Indirizzo->appendChild($tNode);
        $Sede->appendChild($Indirizzo);

        $CAP = $dom->createElement("CAP");
        $tNode = $dom->createTextNode($dat_['CAPSeller']);
        $CAP->appendChild($tNode);
        $Sede->appendChild($CAP);

        $Comune = $dom->createElement("Comune");
        $tNode = $dom->createTextNode($dat_['ComuneSeller']);
        $Comune->appendChild($tNode);
        $Sede->appendChild($Comune);

        $Provincia = $dom->createElement("Provincia");
        $tNode = $dom->createTextNode($dat_['ProvinciaSeller']);
        $Provincia->appendChild($tNode);
        $Sede->appendChild($Provincia);

        $Nazione = $dom->createElement("Nazione");
        $tNode = $dom->createTextNode($dat_['NazioneSeller']);
        $Nazione->appendChild($tNode);
        $Sede->appendChild($Nazione);
        $CedentePrestatore->appendChild($Sede);

        $IscrizioneREA = $dom->createElement("IscrizioneREA");

        $Ufficio = $dom->createElement("Ufficio");
        $tNode = $dom->createTextNode($dat_['Ufficio']);
        $Ufficio->appendChild($tNode);
        $IscrizioneREA->appendChild($Ufficio);



        $NumeroREA = $dom->createElement("NumeroREA");
        $tNode = $dom->createTextNode($dat_['NumeroREA']);
        $NumeroREA->appendChild($tNode);
        $IscrizioneREA->appendChild($NumeroREA);

        $CapitaleSociale = $dom->createElement("CapitaleSociale");
        $tNode = $dom->createTextNode($dat_['CapitaleSociale']);
        $CapitaleSociale->appendChild($tNode);
        $IscrizioneREA->appendChild($CapitaleSociale);

        $SocioUnico = $dom->createElement("SocioUnico");
        $tNode = $dom->createTextNode($dat_['SocioUnico']);
        $SocioUnico->appendChild($tNode);
        $IscrizioneREA->appendChild($SocioUnico);

        $StatoLiquidazione = $dom->createElement("StatoLiquidazione");
        $tNode = $dom->createTextNode($dat_['StatoLiquidazione']);
        $StatoLiquidazione->appendChild($tNode);
        $IscrizioneREA->appendChild($StatoLiquidazione);
        $CedentePrestatore->appendChild($IscrizioneREA);

        $Contatti = $dom->createElement("Contatti");
        $Telefono = $dom->createElement("Telefono");
        $tNode = $dom->createTextNode($dat_['Telefono']);
        $Telefono->appendChild($tNode);
        $Contatti->appendChild($Telefono);

        $Fax = $dom->createElement("Fax");
        $tNode = $dom->createTextNode($dat_['Fax']);
        $Fax->appendChild($tNode);
        $Contatti->appendChild($Fax);

        $Email = $dom->createElement("Email");
        $tNode = $dom->createTextNode($dat_['Email']);
        $Email->appendChild($tNode);
        $Contatti->appendChild($Email);
        $CedentePrestatore->appendChild($Contatti);

        $RiferimentoAmministrazione = $dom->createElement("RiferimentoAmministrazione");
        $tNode = $dom->createTextNode($dat_['RiferimentoAmministrazione']);
        $RiferimentoAmministrazione->appendChild($tNode);
        $CedentePrestatore->appendChild($RiferimentoAmministrazione);
        $FatturaElettronicaHeader->appendChild($CedentePrestatore);

        //**************************тег CessionarioCommittente************************************

        $CessionarioCommittente = $dom->createElement("CessionarioCommittente");

        $DatiAnagrafici = $dom->createElement("DatiAnagrafici");

        $IdFiscaleIVA = $dom->createElement("IdFiscaleIVA");

        $IdPaese = $dom->createElement("IdPaese");
        $tNode = $dom->createTextNode($dat_['IdPaese']);
        $IdPaese->appendChild($tNode);
        $IdFiscaleIVA->appendChild($IdPaese);

        $IdCodice = $dom->createElement("IdCodice");
        $tNode = $dom->createTextNode($dat_['idCodice']);
        $IdCodice->appendChild($tNode);
        $IdFiscaleIVA->appendChild($IdCodice);
        $DatiAnagrafici->appendChild($IdFiscaleIVA);

        $Anagrafica = $dom->createElement("Anagrafica");
        $Denominazione = $dom->createElement("Denominazione");
        $tNode = $dom->createTextNode($dat_['DenominazioneSeller']);
        $Denominazione->appendChild($tNode);
        $Anagrafica->appendChild($Denominazione);
        $DatiAnagrafici->appendChild($Anagrafica);
        $CessionarioCommittente->appendChild($DatiAnagrafici);

        $Sede = $dom->createElement("Sede");
        $Indirizzo = $dom->createElement("Indirizzo");
        $tNode = $dom->createTextNode($dat_['IndirizzoSeller']);
        $Indirizzo->appendChild($tNode);
        $Sede->appendChild($Indirizzo);

        $CAP = $dom->createElement("CAP");
        $tNode = $dom->createTextNode($dat_['CAPSeller']);
        $CAP->appendChild($tNode);
        $Sede->appendChild($CAP);

        $Comune = $dom->createElement("Comune");
        $tNode = $dom->createTextNode($dat_['ComuneSeller']);
        $Comune->appendChild($tNode);
        $Sede->appendChild($Comune);

        $Provincia = $dom->createElement("Provincia");
        $tNode = $dom->createTextNode($dat_['ProvinciaSeller']);
        $Provincia->appendChild($tNode);
        $Sede->appendChild($Provincia);

        $Nazione = $dom->createElement("Nazione");
        $tNode = $dom->createTextNode($dat_['NazioneSeller']);
        $Nazione->appendChild($tNode);
        $Sede->appendChild($Nazione);
        $CessionarioCommittente->appendChild($Sede);
        $FatturaElettronicaHeader->appendChild($CessionarioCommittente);
        $FatturaElettronica->appendChild($FatturaElettronicaHeader);

        //***********************end of header***************************************

        //********************begin of body******************************************

        $FatturaElettronicaBody = $dom->createElement("FatturaElettronicaBody");
        $DatiGenerali = $dom->createElement('DatiGenerali');
        $DatiGeneraliDocumento = $dom->createElement("DatiGeneraliDocumento");

        $TipoDocumento = $dom->createElement("TipoDocumento");
        $tNode = $dom->createTextNode($dat_['TipoDocumento']);
        $TipoDocumento->appendChild($tNode);
        $DatiGeneraliDocumento->appendChild($TipoDocumento);

        $Divisa = $dom->createElement("Divisa");
        $tNode = $dom->createTextNode($dat_['Divisa']);
        $Divisa->appendChild($tNode);
        $DatiGeneraliDocumento->appendChild($Divisa);

        $Data = $dom->createElement("Data");
        $tNode = $dom->createTextNode($dat_['Data']);
        $Data->appendChild($tNode);
        $DatiGeneraliDocumento->appendChild($Data);

        $Numero = $dom->createElement("Numero");
        $tNode = $dom->createTextNode($dat_['Numero']);
        $Numero->appendChild($tNode);
        $DatiGeneraliDocumento->appendChild($Numero);

        $ImportoTotaleDocumento = $dom->createElement("ImportoTotaleDocumento");
        $tNode = $dom->createTextNode($dat_['ImportoTotaleDocumento']);
        $ImportoTotaleDocumento->appendChild($tNode);
        $DatiGeneraliDocumento->appendChild($ImportoTotaleDocumento);
        $DatiGenerali->appendChild($DatiGeneraliDocumento);
        $FatturaElettronicaBody->appendChild($DatiGenerali);

        $DatiBeniServizi = $dom->createElement('DatiBeniServizi');

        $totalSum = 0; //Сума до оплати без урахування податку
        $totalTax = 0; //Загальний податок

        $numLine = 1;  //номерація тегу NumeroLinea
        //*******Перелік послуг(таблична частина)******************
        if(!empty($dat_['DatiBeniServizi']))
        {
            foreach ($dat_['DatiBeniServizi'] as $val)
            {
                $DettaglioLinee = $dom->createElement("DettaglioLinee");
                $NL = $dom->createElement("NumeroLinea");
                $tNode = $dom->createTextNode($numLine);
                $NL->appendChild($tNode);
                $DettaglioLinee->appendChild($NL);

                $D = $dom->createElement("Descrizione");
                $tNode = $dom->createTextNode($val['description']);  //назва послуги
                $D->appendChild($tNode);
                $DettaglioLinee->appendChild($D);

                $Q = $dom->createElement("Quantita");
                $tNode = $dom->createTextNode($val['quantity']);
                $Q->appendChild($tNode);
                $DettaglioLinee->appendChild($Q);

                $PU = $dom->createElement("PrezzoUnitario");
                $tNode = $dom->createTextNode($val['price']);
                $PU->appendChild($tNode);
                $DettaglioLinee->appendChild($PU);

                $Sum = $val['price']*$val['quantity'];

                $taxValue = 0;  //сума податку для однієї послуги
                if($val['tax'] !== 0){
                    $taxValue = ($val['price']*($val['tax']/100)*$val['quantity']);
                }
                $totalTax += $taxValue;

                $totalSum += $Sum;

                $PT = $dom->createElement("PrezzoTotale");
                $tNode = $dom->createTextNode($Sum);
                $PT->appendChild($tNode);
                $DettaglioLinee->appendChild($PT);


                $AIVA = $dom->createElement("AliquotaIVA");
                $tNode = $dom->createTextNode($dat_['AliquotaIVA']);
                $AIVA->appendChild($tNode);
                $DettaglioLinee->appendChild($AIVA);


                $DatiBeniServizi->appendChild($DettaglioLinee);
                $numLine++;
            }
        }
        //******************кінець табличної частини****************

        if($totalTax != 0)
        {
            $numLine = $numLine + 3;
            //**************податок********************************

            $DettaglioLinee = $dom->createElement("DettaglioLinee");
            $NumeroLinea = $dom->createElement("NumeroLinea");
            $tNode = $dom->createTextNode($numLine);
            $NumeroLinea->appendChild($tNode);
            $DettaglioLinee->appendChild($NumeroLinea);

            $CodiceArticolo = $dom->createElement("CodiceArticolo");
            $CodiceTipo = $dom->createElement("CodiceTipo");
            $tNode = $dom->createTextNode($dat_['CodiceTipo']);
            $CodiceTipo->appendChild($tNode);
            $CodiceArticolo->appendChild($CodiceTipo);

            $CodiceValore = $dom->createElement("CodiceValore");
            $tNode = $dom->createTextNode($dat_['CodiceValore']);
            $CodiceValore->appendChild($tNode);
            $CodiceArticolo->appendChild($CodiceValore);
            $DettaglioLinee->appendChild($CodiceArticolo);

            $Descrizione = $dom->createElement("Descrizione");
            $tNode = $dom->createTextNode($dat_['DescrizioneTax']);
            $Descrizione->appendChild($tNode);
            $DettaglioLinee->appendChild($Descrizione);

            $PrezzoUnitario = $dom->createElement("PrezzoUnitario");
            $tNode = $dom->createTextNode($dat_["PrezzoUnitarioTax"]);
            $PrezzoUnitario->appendChild($tNode);
            $DettaglioLinee->appendChild($PrezzoUnitario);


            $PrezzoTotale = $dom->createElement("PrezzoTotale");
            $tNode = $dom->createTextNode($dat_['PrezzoTotaleTax']);
            $PrezzoTotale->appendChild($tNode);
            $DettaglioLinee->appendChild($PrezzoTotale);


            $AliquotaIVA = $dom->createElement("AliquotaIVA");
            $tNode = $dom->createTextNode($dat_['AliquotaIVA']);
            $AliquotaIVA->appendChild($tNode);
            $DettaglioLinee->appendChild($AliquotaIVA);

            $DatiBeniServizi->appendChild($DettaglioLinee);

            //*****************************************************
        }
        $DatiRiepilogo = $dom->createElement("DatiRiepilogo");

        $AliquotaIVA = $dom->createElement("AliquotaIVA");
        $tNode = $dom->createTextNode($dat_['AliquotaIVA']);
        $AliquotaIVA->appendChild($tNode);
        $DatiRiepilogo->appendChild($AliquotaIVA);

        $ImponibileImporto = $dom->createElement("ImponibileImporto");
        $tNode = $dom->createTextNode($totalSum);
        $ImponibileImporto->appendChild($tNode);
        $DatiRiepilogo->appendChild($ImponibileImporto);

        $Imposta = $dom->createElement("Imposta");
        $tNode = $dom->createTextNode($totalTax);
        $Imposta->appendChild($tNode);
        $DatiRiepilogo->appendChild($Imposta);

        $EsigibilitaIVA = $dom->createElement("EsigibilitaIVA");
        $tNode = $dom->createTextNode($dat_['EsigibilitaIVA']);
        $EsigibilitaIVA->appendChild($tNode);
        $DatiRiepilogo->appendChild($EsigibilitaIVA);

        $RiferimentoNormativo = $dom->createElement("RiferimentoNormativo");
        $tNode = $dom->createTextNode($dat_['RiferimentoNormativo']);
        $RiferimentoNormativo->appendChild($tNode);
        $DatiRiepilogo->appendChild($RiferimentoNormativo);
        $DatiBeniServizi->appendChild($DatiRiepilogo);
        $FatturaElettronicaBody->appendChild($DatiBeniServizi);


        $DatiPagamento = $dom->createElement("DatiPagamento");
        $CondizioniPagamento = $dom->createElement("CondizioniPagamento");
        $tNode = $dom->createTextNode($dat_['CondizioniPagamento']);
        $CondizioniPagamento->appendChild($tNode);
        $DatiPagamento->appendChild($CondizioniPagamento);

        $DettaglioPagamento = $dom->createElement("DettaglioPagamento");
        $ModalitaPagamento = $dom->createElement("ModalitaPagamento");
        $tNode = $dom->createTextNode($dat_['ModalitaPagamento']);
        $ModalitaPagamento->appendChild($tNode);
        $DettaglioPagamento->appendChild($ModalitaPagamento);

        $DataScadenzaPagamento = $dom->createElement("DataScadenzaPagamento");
        $tNode = $dom->createTextNode($dat_['DataScadenzaPagamento']);
        $DataScadenzaPagamento->appendChild($tNode);
        $DettaglioPagamento->appendChild($DataScadenzaPagamento);


        $ImportoPagamento = $dom->createElement("ImportoPagamento");
        $tNode = $dom->createTextNode($dat_['ImportoPagamento']);
        $ImportoPagamento->appendChild($tNode);
        $DettaglioPagamento->appendChild($ImportoPagamento);

        $IstitutoFinanziario = $dom->createElement("IstitutoFinanziario");
        $tNode = $dom->createTextNode($dat_['IstitutoFinanziario']);
        $IstitutoFinanziario->appendChild($tNode);
        $DettaglioPagamento->appendChild($IstitutoFinanziario);

        $IBAN = $dom->createElement("IBAN");
        $tNode = $dom->createTextNode($dat_['IBAN']);
        $IBAN->appendChild($tNode);
        $DettaglioPagamento->appendChild($IBAN);

        $DatiPagamento->appendChild($DettaglioPagamento);
        $FatturaElettronicaBody->appendChild($DatiPagamento);
        $FatturaElettronica->appendChild($FatturaElettronicaBody);
        $dom->appendChild($FatturaElettronica);
        return $dom;
    }
}