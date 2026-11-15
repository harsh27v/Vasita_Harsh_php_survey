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

// ACTIVITIES
// Checking that at least one answer is selected and that every answer is allowed.
$activities = $formInput['activities'] ?? [];

$validActivities = ['Studying', 'Playing', 'Exercise', 'Drawing', 'Listening', 'Baking'];

if (!is_array($activities)) {
    $errors['activities'] = 'Please select valid activities!';
}

if (is_array($activities)) {
    if (count($activities) === 0) {
        $errors['activities'] = 'Please select at least one activity!';
    }

    foreach ($activities as $activity) {
        if (!in_array($activity, $validActivities)) {
            $errors['activities'] = 'Please select valid activities!';
        }
    }
}

// ENTERTAINMENT
$entertainment = $formInput['entertainment'] ?? [];

$validEntertainment = array ('Movies', 'Web Series', 'Songs', 'Video games', 'Social Chat', 'Books');

if (!is_array($entertainment)) {
    $errors['entertainment'] = 'Please choose valid entertainment options!';
}

if (is_array($entertainment)) {
    if (count($entertainment) === 0) {
        $errors['entertainment'] = 'Please mark at least one!';
    }

    foreach ($entertainment as $option) {
        if (!in_array($option, $validEntertainment)) {
            $errors['entertainment'] = 'Please set a valid entertainment!';
        }
    }
}

// PLACES
$places = $formInput['places'] ?? [];

$validPlaces = ['Parks', 'Beaches', 'Shopping malls', 'Cinemas', 'Museums', 'Restaurants'];

if (!is_array($places)) {
    $errors['places'] = 'Please choose the valid places!';
}

if (is_array($places)) {
    if (count($places) === 0) {
        $errors['places'] = 'Please select at least one place!';
    }

    foreach( $places as $place) {
        if (!in_array($place, $validPlaces)) {
            $errors['places'] = 'Please select valid places!';
        }
    }
}

// ROUTINE DAY
$routineDay = $formInput['routine_day'] ?? '';

if (!array_key_exists('routine_day', $formInput)) {
    $errors['routine_day'] = 'Routine day must be specified!';
}

if (strlen($routineDay) < 10 || strlen($routineDay) > 500) {
    $errors['routine_day'] = 'Answer should be between 10 and 500 characters!';
}

// FREE TIME
$freeTime = $formInput['free_time'] ?? '';

if (!array_key_exists('free_time', $formInput)) {
    $errors['free_time'] = 'Free time is required!';
}

if (strlen($freeTime) < 10 || strlen($freeTime) > 500) {
    $errors['free_time'] = 'Answer should be 10 to 500 characters long!';
}

// EXERCISE
$exercise = $formInput['exercise'] ?? '';

$validExercise = array ('Every day', 'Sometimes a week', 'Once a week', 'Rarely');

if (!array_key_exists('exercise', $formInput)) {
    $errors['exercise'] = 'Select an exercise answer to the question!';
}

if (!in_array($exercise, $validExercise)) {
    $errors['exercise'] = 'Select an appropriate exercise response!';
}

// RELAX
$relax = $formInput['relax'] ?? '';

$validRelax = ['Listening musics', 'Watching TV', 'Reading', 'Going for a walk'];

if (!array_key_exists('relax', $formInput)) {
    $errors['relax'] = 'There should be a relaxing activity selected!';
}

if (!in_array($relax, $validRelax)) {
    $errors['relax'] = 'Select a appropriate relaxing activity!';
}

// TRAVEL
$travel = $formInput['travel'] ?? '';

$validTravel = array('Very often', 'Sometimes in year', 'Once a year', 'Rarely');

if (!array_key_exists('travel', $formInput)) {
    $errors['travel'] = 'You must choose an answer to the travel question!';
}

if (!in_array($travel, $validTravel)) {
    $errors['travel'] = 'Select a valid response to the travel question!';
}

// WEEKEND
$weekend = $formInput['weekend'] ?? '';

$validWeekend = ['Staying at home', 'Meeting friends', 'Going outdoors', 'Shopping or entertainment'];

if (!array_key_exists('weekend', $formInput)) {
    $errors['weekend'] = 'Please choose a weekend answer!';
}

if (!in_array($weekend, $validWeekend)) {
    $errors['weekend'] = 'Please select a correct weekend answer!';
}

// TELEPHONE
$telephone = $formInput['telephone'] ?? '';

if (!array_key_exists('telephone', $formInput)) {
    $errors['telephone'] = 'Telephone number is required!';
}

// Ensuring that the number entered into the telephone has 10 - 15 digits.
if (strlen($telephone) < 10 || strlen($telephone) > 15) {
    $errors['telephone'] = 'Please type a telephone number that uses 10-15 numbers!';
}

// BIRTH DATE
$birthDate = $formInput['birth_date'] ?? '';

if (!array_key_exists('birth_date', $formInput)) {
    $errors['birth_date'] = 'The birth date is required!';
}

// Check that the birth date has 10 characters.
if (strlen($birthDate) !== 10) {
    $errors['birth_date'] = 'The birth date is not valid!';
}

// PREFERRED COLOR
$preferredColor = $formInput['preferred_color'] ?? '';

if (!array_key_exists('preferred_color', $formInput)) {
    $errors['preferred_color'] = 'Please select a colour!';
}

// Making sure the color value is seven characters long.
if (strlen($preferredColor) !== 7) {
    $errors['preferred_color'] = 'Please select a colour!';
}

// Store errors to be able to show them on the survey page.
$_SESSION['form_errors'] = $errors;

// Send email if there are no validation errors.
if (count($errors) === 0) {
    $to = 'hello@email.com';
    $subject = 'New Habits Survey Response';
    $message = "Name: " . $name . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Age: " . $age . "\n";
    $message .= "Profession: " . $profession . "\n";
    $message .= "City: " . $city . "\n";
    $message .= "Hobby: " . $hobby . "\n";
    $message .= "Routine Day: " . $routineDay . "\n";
    $message .= "Free Time: " . $freeTime . "\n";
    $message .= "Exercise: " . $exercise . "\n";
    $message .= "Relax: " . $relax . "\n";
    $message .= "Travel: " . $travel . "\n";
    $message .= "Weekend: " . $weekend . "\n";
    $message .= "Telephone: " . $telephone . "\n";
    $message .= "Birth Date: " . $birthDate . "\n";
    $message .= "Preferred Color: " . $preferredColor;

    mail($to, $subject, $message);
    $_SESSION['success'] = true;
}

// Go back to the survey page.
header('Location: /php_survey/index.php');
exit;