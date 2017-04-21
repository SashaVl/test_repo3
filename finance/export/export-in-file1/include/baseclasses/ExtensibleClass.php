<?php

class ExtensibleClass
{
    protected $nodeXml;


    /**
     * @return SimpleXMLElement
     */
    public function getNodeXml()
    {
        return $this->nodeXml;
    }

    /**
     * @param mixed $nodeXml
     */
    public function setNodeXml( SimpleXMLElement $nodeXml)
    {
        $this->nodeXml = $nodeXml;
    }
    
     protected function check($nameToCheck){
        if ($this->getNodeXml()->getName() != $nameToCheck){
            throw new FatturaElettronicaNodoErratoException("Nome Aspettato: " . $nameToCheck . " || Nome Ottenuto: " . $this->getNodeXml()->getName() );
        }
        
    }
    
    protected function checkIfExistAndSet($element, $functionToCall = ''){
        if ( !$functionToCall ){
            $functionToCall = "set" . $element;
        }

        if ( $this->getNodeXml()->$element){
            $this->$functionToCall();
        }
    }
}