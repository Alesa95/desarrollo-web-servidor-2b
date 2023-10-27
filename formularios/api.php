<?php
    // latest with specific base currency
    $url = "https://api.currencyapi.com/v3/latest?apikey=cur_live_QNx5FIKmfRMsmRhE15LXR5Emlxss7YGnAjw7KUiM&base_currency=USD";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    print_r($response);
?>