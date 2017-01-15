<?php

echo "Add User ID or Screen name \n";
$handle = fopen ("php://stdin","r");
$ID = fgets($handle);

$fields = array(
	'photo_id',
	'sex',
	'status',
	'verified'
	);

$data = array (
 'client_id' =>'5744753',
 'redirect_uri' => 'https://oauth.vk.com/blank.html',
 'user_ids' => $ID,
 'fields' => implode(',', $fields),
'access_token' => '76864711bbcd4a57bd0db0874cae7cd90ee01762bb91430ab84c91ef9fadce7e09d5cef931f7184859c2e'
);

$url = "https://api.vk.com/method/users.get?" . http_build_query($data);

$result = file_get_contents($url);

print_r(json_decode($result, true));