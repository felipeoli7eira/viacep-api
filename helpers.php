<?php

function showInWebPage(array $response) {
    header('Content-Type: application/json');
    echo json_encode( $response );
    exit();
}

function showInTerminal(array $response) {
    print_r($response);
    exit();
}