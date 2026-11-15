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

// NAME
$name = $formInput['name'] ?? '';

if (!array_key_exists('name', $formInput)) {
    $errors['name'] = 'Name is required!';
}

if (strlen($name) < 3 || strlen($name) > 30) {
    $errors['name'] = 'Name must be between 3 and 30 characters!';
}

// EMAIL
$email = $formInput['email'] ?? '';

if (!array_key_exists('email', $formInput)) {
    $errors['email'] = 'Email is required!';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Enter a valid email address!';
}

// AGE
$age = $formInput['age'] ?? '';

if (!array_key_exists('age', $formInput) || strlen($age) == 0) {
    $errors['age'] = 'Age is reuired!';
}

if (strlen($age) > 3) {
    $errors['age'] = 'Enter a valid age!';
}

// PROFESSION
$profession = $formInput['profession'] ?? '';

if (!array_key_exists('profession', $formInput)) {
    $errors['profession'] = 'Profession is required!';
}

if (strlen($profession) < 2 || strlen($profession) > 50) {
    $errors['profession'] = 'Profession must be between 2 and 50 characters!';
}

// CITY
$city = $formInput['city'] ?? '';

if (!array_key_exists('city', $formInput)) {
    $errors['city'] = 'City is required!';
}

if (strlen($city) < 2 || strlen($city) > 50) {
    $errors['city'] = 'City must be between 2 and 50 characters!';
}

// HOBBY
$hobby = $formInput['hobby'] ?? '';

if (!array_key_exists('hobby', $formInput)) {
    $errors['hobby'] = 'Hobby is required!';
}

if (strlen($hobby) < 2 || strlen($hobby) > 50) {
    $errors['hobby'] = 'Hobby must be between 2 and 50 characters!';
}
