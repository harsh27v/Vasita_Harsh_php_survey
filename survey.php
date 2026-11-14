<?php
session_start();

// grab the errors from the session, or default to an empty 
// array if the key does not exist or is null
//
// store the errors in a variable so we don't have to keep reading $_SESSION
$errors = $_SESSION['form_errors'] ?? [];

// store the inputs in a variable so we don't have to keep reading $_SESSION
$submittedInputs = $_SESSION['form_input']   ?? [];
$submittedName   = $submittedInputs['name']  ?? '';
$submittedEmail  = $submittedInputs['email'] ?? '';
$submittedAge = $submittedInputs['age'] ?? '';
$submittedProfession = $submittedInputs['profession'] ?? '';
$submittedCity = $submittedInputs['city'] ?? '';
$submittedHobby = $submittedInputs['hobby'] ?? '';
$submittedRT = $submittedInputs['routine_day'] ?? '';
$submittedFT = $submittedInputs['free_time'] ?? '';
$submittedTEL = $submittedInputs['telephone'] ?? '';
$submittedBT = $submittedInputs['birth_date'] ?? '';
$submittedColor = $submittedInputs['preferred_color'] ?? '';

// reset Inputted data so that if the user refreshes the page,
// the old information is no longer in the session
$_SESSION['form_input'] = [];

// resolve the errors
$_SESSION['form_errors'] = [];
?>