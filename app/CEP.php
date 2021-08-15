<?php

namespace App;

class CEP
{
    public static function consult(string $strCEP = ''): array
    {
        if ( mb_strlen($strCEP) === 8 ) {

            return self::sendRequestToViaCEPApi($strCEP);
        }

        return [];
    }

    private static function sendRequestToViaCEPApi(string $strCEP): array
    {
        $curlConfigs = [
            CURLOPT_URL            => "https://viacep.com.br/ws/{$strCEP}/json/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => 'GET'
        ];

        $curlProcess = curl_init();

        curl_setopt_array($curlProcess, $curlConfigs);

        // response
        $response = curl_exec($curlProcess);
        curl_close($curlProcess);

        $responseAssocArray = json_decode($response, true);

        if ( is_null( $responseAssocArray ) ) {
            return [];
        }

        return $responseAssocArray;
    }
}