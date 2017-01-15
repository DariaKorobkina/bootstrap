<?php

function save_photo($photo_src) {
    $host = "127.0.0.1";
    $user = "root";
    $pawd = "dreamteam";
    $db = "vk";

    $connection = mysqli_connect($host, $user, $pawd, $db);

    $query = "
        INSERT INTO photo (
            id,
            picture_url
        ) VALUES (\"";

    // var_dump($photo_src);exit;
    $new_arr = [];
    foreach ($photo_src as $key => $value) {
        $new_arr[] = strval($key) . "\", \"" . $value;
    }
    $query = $query . implode("\"), (\"", $new_arr) . "\")";

// var_dump($query);exit;
    $result = mysqli_query($connection, $query);

    if (false === $result) {
      printf("error: %s\n", mysqli_error($connection));
    }
    else {
      echo 'done.';
    }

    // var_dump($query);exit;

}
    // 1, url1), (2, url2), ....