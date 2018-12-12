<?php
$ch = curl_init();
$url = 'https://192.168.4.2/sdk_service/rest/users/login/v1.1';
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "account=dco&pwd=huawei@12345");
$result = curl_exec($ch);
if (curl_error($ch)) {
    echo curl_error($ch);
}
print_r($result);
?>