<?php


$number = $_POST["number"];
$message = $_POST["message"];



$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => 'https://4ae9.playfabapi.com/Client/ExecuteCloudScript?sdk=UnitySDK-2.135.220509',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "{\n  'CustomTags': null,\n  'FunctionName': 'AddRp',\n  'FunctionParameter': {\n    'addValue': ".$number."\n  },\n  'GeneratePlayStreamEvent': false,\n  'RevisionSelection': 'Live',\n  'SpecificRevision': null,\n  'AuthenticationContext': null\n}",
  CURLOPT_HTTPHEADER => [
    "User-Agent: UnityPlayer/2021.3.8f1 (UnityWebRequest/1.0, libcurl/7.80.0-DEV)",
    "Accept-Encoding: deflate, gzip",
    "Content-Type: application/json",
    "X-ReportErrorAsSuccess: true",
    "X-PlayFabSDK: UnitySDK-2.135.220509",
    "X-Authorization: $message", 
    "X-Unity-Version: 2021.3.8f1",
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo 'cURL Error #:' . $err;
} else {
  echo $response;
}