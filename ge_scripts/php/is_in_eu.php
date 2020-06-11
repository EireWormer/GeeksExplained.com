<?php

function getIPAddr() {
    if (isset($_SERVER['REMOTE_ADDR'])) {
        return $_SERVER['REMOTE_ADDR'];
    }
    elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
        return false;
    }
}

function getCountryCode($ipAddr) {
    $query = 'http://ip-api.com/json/' . $ipAddr . '?fields=status,countryCode';

    $jsonResults = file_get_contents($query);

    $decoded_json = json_decode($jsonResults);
    $status = $decoded_json->status;

    if($status == 'success') {
        $countryCode = $decoded_json->countryCode;
        return $countryCode;
    }
    else {
        return false;
    }
}

function isInEU($countryCode) {
    # Array of country codes of all 27 EU member states
    $euCountries = array(
        "AT", "BE", "BG", "HR", "CY", "CZ", "DK", "EE", "FI", "FR", "DE", "GR", 
        "HU", "IE", "IT", "LV", "LT", "LU", "MT", "NL", "PL", "PT", "RO", "SK", 
        "SI", "ES", "SE"
    );

    return in_array($countryCode, $euCountries);
}

function displayCookieConsent() {
    $ipAddr = getIPAddr();

    if( $ipAddr === false ) {
        #failafe. if ip fails the display cookie notice.
        return true;
    } else {
        if(isInEU(getCountryCode($ipAddr))) {
            return true;
        } else {
            return false;
        }
    }

    return true;
}

?>