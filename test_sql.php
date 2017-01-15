<?php

define("name_db", "test_db");

mb_internal_encoding("UTF-8");

echo "Add group ID \n";
$handle = fopen ("php://stdin","r");
$ID = fgets($handle);
/*dfg*/
/*$fields = array(
	'city',
	'members_count',
	'counters'
	);*/

$data = array (
 'client_id' =>'5744753',
 'redirect_uri' => 'https://oauth.vk.com/blank.html',
 'group_ids' => $ID,
 /*'fields' => implode(',', $fields),*/
'access_token' => '76864711bbcd4a57bd0db0874cae7cd90ee01762bb91430ab84c91ef9fadce7e09d5cef931f7184859c2e'
);

$url = "https://api.vk.com/method/groups.getById?" . http_build_query($data);

$result = file_get_contents($url);

/*print_r(json_decode($result, true));*/
$some = json_decode($result, true);

$gid = $some['response'][0]['gid'];
$name = $some['response'][0]['name'];


$link = mysqli_connect("localhost", "root", "", "test_db");

$query = "INSERT INTO
	  groups(
	  id,
	   name,
	   	screen_name
	  ) VALUES (
	  '" . $gid ."'
	   '" . $name . "',
	  	 '" . $ID . "')";

var_dump($query);

$sql = mysqli_query($link, $query);

$linka = mysqli_connect("localhost", "root", "", name_db);
$print = mysqli_select_db('name_db');
$row = mysql_fetch_array(mysqli_query("select * from groups"));
echo $row['screen_name'];