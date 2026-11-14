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
    <main class="center-grid-con">
        
    <form action="includes/scripts/process_survey_form.php" method="POST" class="col-span-full">
        <section class="form-section">
            <h2>Identifying Information</h2>
            <div>
                <?php
                    if (array_key_exists('name', $errors)) {
                        echo '<p style="color:red">' . $errors['name'] . '</p>';
                        }
                ?>
                <label for="name">1. What's your Name?</label>
                <input id="name" name="name" type="text" placeholder="Enter your name"
                    <?php
                        if (count($errors) > 0 && $submittedName) {
                            echo 'value="' . $submittedName . '"';
                        }
                    ?>
                >
            </div>
            <div>
                <?php
                    if (array_key_exists('email', $errors)) {
                        echo '<p style="color:red">' . $errors['email'] . '</p>';
                    }
                ?>
                <label for="email">2. What's your email address?</label>
                <input id="email" name="email" type="email" placeholder="youremail@email.com"
                <?php if (count($errors) > 0 && $submittedEmail) {
                    echo 'value="' . $submittedEmail . '"';
                    } ?>
            >
            </div>
            <div>
                <?php
                    if (array_key_exists('age', $errors)) {
                        echo '<p style="color:red">' . $errors['age'] . '</p>';
                    }
                ?>
            <label for="age">3. What's your age?</label>
            <input id="age" name="age" type="text" placeholder="Enter your age"
                <?php
                    if (count($errors) > 0 && $submittedAge) {
                        echo 'value="' . $submittedAge . '"';
                    }
                ?>
            >
            </div>
            <div>
                <?php
                    if (array_key_exists('profession', $errors)) {
                        echo '<p style="color:red">' . $errors['profession'] . '</p>';
                    }
                ?>
            <label for="profession">4. What's your profession?</label>
            <input id="profession" name="profession" type="text" placeholder="Enter your profession"
                <?php
                    if (count($errors) > 0 && $submittedProfession) {
                        echo 'value="' . $submittedProfession . '"';
                    }
                ?>
            >
            </div>
            <div>
                <?php
                    if (array_key_exists('city', $errors)) {
                        echo '<p style="color:red">' . $errors['city'] . '</p>';
                    }
                ?>
            <label for="city">5. Which city do you live in?</label>
            <input id="city" name="city" type="text" placeholder="Enter your city"
                <?php
                    if (count($errors) > 0 && $submittedCity) {
                            echo 'value="' . $submittedCity . '"';
                    }
                ?>
            >
            </div>
            <div>
                <?php
                    if (array_key_exists('hobby', $errors)) {
                        echo '<p style="color:red">' . $errors['hobby'] . '</p>';
                    }
                ?>
            <label for="hobby">6. What's your favourite hobby?</label>
            <input id="hobby" name="hobby" type="text" placeholder="Enter your hobby"
                <?php if (count($errors) > 0 && $submittedHobby) {
                    echo 'value="' . $submittedHobby . '"';
                } ?>
            >
            </div>
        </section>
                
        <section class="form-section">
            <h2>What's Your Interests</h2>
            <fieldset>
                <?php
                    if (array_key_exists('activities', $errors)) {
                        echo '<p style="color:red">' . $errors['activities'] . '</p>';
                    }
                ?>
                <legend>7. What are your favorite activities?</legend>

                <label for="studying">Studying</label>
                <input id="studying" name="activities[]" type="checkbox" value="Studying">

                <label for="playing">Playing</label>
                <input type="checkbox" name="activities[]" value="Playing" id="playing">

                <label for="exercise">Exercise</label>
                <input type="checkbox" name="activities[]" value="Exercise" id="exercise">

                <label for="drawing">Drawing</label>
                <input type="checkbox" name="activities[]" id="drawing" value="Drawing">

                <label for="listening">Listening</label>
                <input type="checkbox" name="activities[]" value="Listening" id="listening">

                <label for="baking">Baking</label>
                <input type="checkbox" id="baking" name="activities[]" value="Baking">
            </fieldset>
            <fieldset>
                <?php
                    if (array_key_exists('entertainment', $errors)) {
                        echo '<p style="color:red;">' . $errors['entertainment'] . '</p>';
                    }
                ?>
                <legend>8. What's your entertainment platforms?</legend>

                <label for="movies">Movies</label>
                <input type="checkbox" name="entertainment[]" value="Movies" id="movies">

                <label for="web_series">Web Series</label>
                <input type="checkbox" id="web_series" name="entertainment[]" value="Web Series">

                <label for="songs">Songs</label>
                <input id="songs" type="checkbox" name="entertainment[]" value="Songs">

                <label for="video_games">Video games</label>
                <input type="checkbox" id="video_games" name="entertainment[]" value="Video games">

                <label for="social_chat">Social Chat</label>
                <input id="social_chat" type="checkbox" name="entertainment[]" value="Social Chat">

                <label for="books">Books</label>
                <input id="books" type="checkbox" name="entertainment[]" value="Books">
            </fieldset>



    
</body>
</html>