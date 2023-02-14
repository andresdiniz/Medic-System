<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://v5.chatpro.com.br/chatpro-49b472e11d/api/v1/create_group",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"phones\":[\"31999195336\"],\"name\":\"TESTE API\"}",
  CURLOPT_HTTPHEADER => [
    "Authorization: 9ff9f5c4f95376455fdeae1890735260",
    "accept: application/json",
    "content-type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}