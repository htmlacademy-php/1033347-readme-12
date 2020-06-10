<?php
require_once('config/config.php');

function db_connect($db)
{
    $link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);

    if (!$link) {
        $error = mysqli_connect_error();
        $content = include_template('error.php', [
            'error' => $error
        ]);
        $result = $content;
    } else {
        mysqli_set_charset($link, 'utf8');
        $result = $link;
    }

    return $result;
};

function db_request($link, $sql)
{
    return mysqli_fetch_all(mysqli_query($link, $sql), MYSQLI_ASSOC);
}
