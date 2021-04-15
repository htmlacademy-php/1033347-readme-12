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

if (isset($_POST['current-tab'])) {
    $tab_name = $_POST['current-tab'];
} else {
    $tab_name = "quote";
}

// Check FORM

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILES['userpic-file-photo'])) {
        $file_name = $_FILES['userpic-file-photo']['name'];
        $file_path = __DIR__ . '/uploads/';
        $file_url = '/uploads/' . $file_name;
        $file_from = $_FILES['userpic-file-photo']['tmp_name'];
        $file_to = $file_path . $file_name;
        move_uploaded_file($file_from, $file_to);
    }

}

$layout = include_template('layout.php', [
  'title' => $title,
  'is_auth' => $is_auth,
  'user_name' => $user_name,
  'tab_name' => $tab_name,
  'content' => $content
]);

echo ($layout);
