<?php
require_once('config/settings.php');

$is_auth = rand(0, 1);

$user_name = 'ivan';

$title = 'readme: популярное';

// Check DB connection
if (!$con) {
    $error = mysqli_connect_error();
    $content = include_template('error.php', [
        'error' => $error
    ]);

// Check existence of $_GET['id]
} else  if (!isset($_GET['id'])) {
    http_response_code(404);
} else {
    $post_ID = intval($_GET['id']);
    $sql_post = "SELECT
        *
        FROM posts AS p
        JOIN content_types AS c ON c.id = p.content_type_ID
        JOIN users AS u ON u.id = p.post_author_ID
        WHERE p.id = $post_ID";
    $post = mysqli_query($con, $sql_post);

// Check existence field in post
    if (mysqli_num_rows($post) === 0) {
        http_response_code(404);
    } else {
        $post = db_request($con, $sql_post);
        $content = include_template('post_template.php', [
            'post' => $post[0]
        ]);
    };
}

if ($content) {
    $layout = include_template('layout.php', [
        'title' => $title,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'content' => $content
    ]);
}

echo ($layout);
