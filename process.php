<?php
$name = $_POST["cs1Name"];
$email = $_POST["cs1Email"];
$api_key = "X-Auth-Token: api-key iaskh0376fol0tsdkg50ygnqyuautxme";
$url = 'https://api.getresponse.com/v3/contacts';
$data = array (
  'name' => $name,
  'email' => $email,
  'campaign' => array('campaignId'=>'zhfp8'), //list_token
  'ipAddress'=> $_SERVER['REMOTE_ADDR']
);
$data_string = json_encode($data);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $api_key ));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$success = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close ($ch);
if ($success){
   echo "success";
}else{
    echo "invalid";
}
?>