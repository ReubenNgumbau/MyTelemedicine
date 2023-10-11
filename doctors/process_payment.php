<?php

$ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');

// Set the HTTP headers as an array
$headers = [
    'Authorization: Bearer GBMhCA2TFTba8AKPejTG8dwEL3pn',
    'Content-Type: application/json',
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_POST, 1);

// Generate the correct timestamp in UTC time
$timestamp = gmdate('YmdHis');

// Create an array with the data and encode it as JSON
$data = [
    "BusinessShortCode" => 174379,
    "Password" => "MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMjMwOTI5MTUwOTA1",
    "Timestamp" => $timestamp,
    "TransactionType" => "CustomerPayBillOnline",
    "Amount" => 1,
    "PartyA" => 254713507242,
    "PartyB" => 174379,
    "PhoneNumber" => 254713507242,
    "CallBackURL" => "https://mydomain.com/path",
    "AccountReference" => "FHTK",
    "TransactionDesc" => "FHTK",
];

$json_data = json_encode($data);

curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

echo $response;
?>
