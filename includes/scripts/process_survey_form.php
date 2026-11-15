<?php

declare(strict_types=1);

session_start();

// only process the form when it's submited
$requestType = $_SERVER['REQUEST_METHOD'];

if ($requestType !== 'POST') {
    http_response_code(500);
    exit('Must be a POST request!');
}

// Store the submitted answers so the form can keep them if there are errors.
$formInput = $_POST;
$_SESSION['form_input'] = $formInput;

$errors = [];