<?php
header('Content-Type: application/json');

// Read tags from JSON file
function getHead() {
    $jsonContent = file_get_contents('data/head.json');
    $data = json_decode($jsonContent, true);
    return $data['head'];
}

$head = getHead();
echo json_encode($head);
?>
