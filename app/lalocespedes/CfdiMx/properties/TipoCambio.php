<?php

namespace lalocespedes\CfdiMx\properties;

use Exception;
use SimpleXMLElement;

/**
 *
 */
class TipoCambio
{
    final public static function extract(SimpleXMLElement $xml, array $namespace, $version)
    {
        switch ($version) {
            case 3:
            case 3.2:
                return $xml['TipoCambio'];
                break;
            default:
                throw new Exception('Unkown document version ' . $version);
                break;
        }
    }
}
