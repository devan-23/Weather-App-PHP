<?php
header('Content-Type: application/json');

$movieJson = file_get_contents('data/movie.json');
$headJson = file_get_contents('data/head.json');

echo json_encode([
    'movie' => json_decode($movieJson, true),
    'head' => json_decode($headJson, true),
    'php_version' => PHP_VERSION,
    'json_last_error' => json_last_error(),
    'json_last_error_msg' => json_last_error_msg()
]);
?>
