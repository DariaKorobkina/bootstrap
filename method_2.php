<?php
require_once 'method.php';
 
$api_id = 5744753;
$api_key = 'I033MuWTHceCn12ZouZp';
$api_uid = 'dasha_alexandrovna';
 
$path = $_SERVER['DOCUMENT_ROOT'] . (dirname($_SERVER['REQUEST_URI'])=='/' ? dirname($_SERVER['REQUEST_URI']) : dirname($_SERVER['REQUEST_URI']).'/');
 
if(isset($_FILES['file1']) and !in_array(pathinfo
	($_FILES['file1']['tmp_name'],
		PATHINFO_EXTENSION), array('mp3'))) {

$file = 'files/' . substr(uniqid(), 0, 6) . '.' . pathinfo(basename(
	$_FILES['file1']['name']),
		PATHINFO_EXTENSION);
 
move_uploaded_file($_FILES['file1']['tmp_name'], $file);
 
$VK = new vkapi ($api_id, $api_key, $api_uid);
$Server = $VK -> api('audio.getUploadServer');
$Upload = $VK -> file_send($Server -> upload_url, $file, $path);
$Save = $VK -> api('audio.save', array('hash' => $Upload -> hash, 'audio' => $Upload -> audio, 'server' => $Upload -> server));
 
unlink($file);
 
nl2br(print_r($Save));
}
 
echo'Выберите MP3-файл:';