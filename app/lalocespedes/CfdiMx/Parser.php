<?php

namespace lalocespedes\CfdiMx;

use SimpleXMLElement;
use Exception;
use JsonSerializable;
//use Endroid\QrCode\QrCode;


/**
 *
 */
class Parser implements JsonSerializable
{
    private $_mapping;
    public $_file;
    /**
     * Construct
     * @param string $file Path to the xml file
     */
    final public function __construct($file = null)
    {   

        // $config = new Config;
        // $config->load('config/config.php');

        if (!is_file($file)) throw new Exception('Error: no file found');

        $xml = new SimpleXMLElement(file_get_contents($file));

        $this->_file = $file;
        // Gets mapping object
        $this->_mapping = new Mapping($xml);

    }

    /**
     * JSON Serialize method
     * @return array XML Parse data
     */
    final public function jsonSerialize()
    {   

        //$valid = new Validator($this->_file);

        // if($valid->init())
        // {
        //     foreach ($valid->init() as $error) {
                
        //         echo $error.'<br>';
        //     }

        //     exit();
        
        // } else {

        //     $sat = new Sat;
        //     $result = $sat->valida_cfdi($this->_mapping->total, $this->_mapping->emisor['@atributos']['rfc'], $this->_mapping->receptor['@atributos']['rfc'], $this->_mapping->complemento['TimbreFiscalDigital']['@atributos']['UUID']);

        //     if($result === 'N') throw new Exception('Error: xml no registrado en el SAT, si el documento tiene menos de 72 hrs favor de intentarlo mas tarde');  //agregarle fecha del documento

        // $qrCode = new QrCode();

        // $qrCode
        //     ->setText("Life is too short to be generating QR codes")
        //     ->setSize(120)
        //     ->setPadding(10)
        //     ->setErrorCorrection('high')
        //     ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
        //     ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
        // ;

        // $qr = base64_encode($qrCode->get());

            return array(
            'Comprobante' => array(
                '@atributos' => array(
                    'fecha'             => $this->_mapping->fecha,
                    'folio'             => $this->_mapping->folio,
                    'serie'             => $this->_mapping->serie,
                    'TipoDeComprobante' => $this->_mapping->TipoDeComprobante,
                    'subtotal'          => $this->_mapping->subTotal,
                    'descuento'         => $this->_mapping->descuento,
                    'total'             => $this->_mapping->total,
                    'moneda'            => $this->_mapping->moneda,
                    'TipoCambio'        => $this->_mapping->TipoCambio,
                    'condicionesDePago' => $this->_mapping->condicionesDePago,
                    'noCertificado'     => $this->_mapping->noCertificado,
                    'certificado'       => $this->_mapping->certificado,
                    'formaDePago'       => $this->_mapping->formaDePago,
                    'metodoDePago'      => $this->_mapping->metodoDePago,
                    'NumCtaPago'        => $this->_mapping->NumCtaPago,
                    'LugarExpedicion'   => $this->_mapping->LugarExpedicion,
                    'sello'             => $this->_mapping->sello,
                    'version'           => $this->_mapping->version()
                    ),
                '@namespaces' => $this->_mapping->namespaces(),
                'Emisor'      => $this->_mapping->emisor,
                'Receptor'    => $this->_mapping->receptor,
                'Conceptos'   => $this->_mapping->conceptos,
                'Impuestos'   => $this->_mapping->impuestos,
                'Complemento' => $this->_mapping->complemento,
                //'codigobarra' => $qr
                )
            );
        //}
    }

}