<?php
//coment
define("access_vk_url", "https://oauth.vk.com/access_token");
define("id_vk", "dasha_alexandrovna");
define("app_key", "I033MuWTHceCn12ZouZp");
define("vk_url", "https://vk.com");
define("client_id", "5744753");
define("redirect_uri","https://oauth.vk.com/blank.html");

$permission = array(
        'notify', 'friends', 'video', 'audio', 'photos', 'status', 'offline'
    );

$request_par = array(
    'client_id' => '5744753',
    'redirect_uri' => 'https://oauth.vk.com/blank.html',
    'responce_type' =>'token',
    'display' => 'page',
    'scope' => implode(",", $permission)
    );
$url = 'https://oauth.vk.com/authorize?' . http_build_query($request_par);
echo $url;
