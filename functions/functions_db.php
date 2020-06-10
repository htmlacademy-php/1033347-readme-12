<?php
require_once('config/config.php');

function db_connect($db)
{
    $link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);

    mysqli_set_charset($link, 'utf8');

    return $link;
};

function db_request($link, $sql)
{
    return mysqli_fetch_all(mysqli_query($link, $sql), MYSQLI_ASSOC);
};
