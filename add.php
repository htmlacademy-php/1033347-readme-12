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
} else {
    $sql_types = 'SELECT * FROM content_types';
    
    $types = db_request($con, $sql_types);

    $content = include_template('adding-post.php', [
      'types' => $types,
    ]);
};

$layout = include_template('layout.php', [
  'title' => $title,
  'is_auth' => $is_auth,
  'user_name' => $user_name,
  'content' => $content
]);

echo ($layout);
