<?php
require_once('config/settings.php');

$is_auth = rand(0, 1);

$user_name = 'ivan';

$title = 'readme: популярное';

if (!$con) {
    $error = mysqli_connect_error();
    $content = include_template('error.php', [
        'error' => $error
    ]);
} else {
    if (isset($_GET['id'])) {

        $post_id = intval($_GET['id']);

        $sql_post = "";
    } else {
        echo http_response_code(404);
    }

    $post = db_request($con, $sql_post);

    $content = include_template('post_template.php', [
        'post' => $post
    ]);
};

$layout = include_template('layout.php', [
    'title' => $title,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'content' => $content
]);

echo ($layout);
