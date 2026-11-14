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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habits Survey</title>
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <header class="center-grid-con">
        <div class="col-span-full">
            <h1>Habits &amp; Daily Routine</h1>
            <p>This is the lifestyles and daily habits survey. Tell me your interests by answering the following questions. Thank you for sending your interests.</p>
        </div>
    </header>


    
</body>
</html>