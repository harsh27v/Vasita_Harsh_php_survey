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
            <fieldset>
                <?php
                    if (array_key_exists('places', $errors)) {
                        echo '<p style="color:red">'. $errors['places'] .'</p>';
                    }
                ?>
                <legend>9. What's your enjoyable visiting place?</legend>

                <label for="parks">Parks</label>
                <input type="checkbox" name="places[]" id="parks" value="Parks">

                <label for="beaches">Beaches</label>
                <input type="checkbox" name="places[]" value="Beaches" id="beaches">

                <label for="shopping_malls">Shopping malls</label>
                <input type="checkbox" name="places[]" id="shopping_malls" value="Shopping malls">

                <label for="cinemas">Cinemas</label>
                <input type="checkbox" name="places[]" value="Cinemas" id="cinemas">

                <label for="museums">Museums</label>
                <input id="museums" type="checkbox" name="places[]" value="Museums">

                <label for="restaurants">Restaurants</label>
                <input id="restaurants" type="checkbox" name="places[]" value="Restaurants">
            </fieldset>
        </section>

        <section class="form-section">
                <h2>Describe Us More</h2>
                <div>
                    <?php
                        if (array_key_exists('routine_day', $errors)) {
                            echo '<p style="color:red">' . $errors['routine_day'] . '</p>';
                        }
                    ?>
                <label for="routine_day">10. Describe your routine day.</label>
                <textarea id="routine_day" name="routine_day"><?php
                if (count($errors) > 0 && $submittedRT) {
                    echo $submittedRT;
                }?></textarea>
                </div>
                <div>
                    <?php
                        if (array_key_exists('free_time', $errors)) {
                            echo '<p style="color:red">' . $errors['free_time'] . '</p>';
                        }
                    ?>
                <label for="free_time">11. Describe your free time?</label>
                <textarea id="free_time" name="free_time"><?php
                if (count($errors) > 0 && $submittedFT) {
                        echo $submittedFT;
                    }?></textarea>
                </div>
        </section>
        <section class="form-section">
                <h2>Your Daily Habits</h2>
                <fieldset>
                    <?php
                        if (array_key_exists('exercise', $errors)) {
                            echo '<p style="color:red">' . $errors['exercise'] . '</p>';
                        }
                    ?>
                    <legend>12. How often do you exercise?</legend>

                    <label for="exercise_daily">Every day</label>
                    <input id="exercise_daily" type="radio" name="exercise" value="Every day">

                    <label for="exercise_few_times">Sometimes a week</label>
                    <input id="exercise_few_times" type="radio" name="exercise" value="Sometimes a week">

                    <label for="exercise_weekly">Once a week</label>
                    <input id="exercise_weekly" type="radio" name="exercise" value="Once a week">

                    <label for="exercise_rarely">Rarely</label>
                    <input id="exercise_rarely" type="radio" name="exercise" value="Rarely">
                </fieldset>

                <fieldset>
                    <?php
                        if (array_key_exists('relax', $errors)) {
                            echo '<p style="color:red">' . $errors['relax'] . '</p>';
                        }
                    ?>
                    <legend>13. What's your ways of relaxing?</legend>

                    <label for="listening_music">Listening musics</label>
                    <input id="listening_music" type="radio" name="relax" value="Listening musics">

                    <label for="TV">Watching TV</label>
                    <input id="TV" type="radio" name="relax" value="Watching TV">

                    <label for="read">Reading</label>
                    <input id="read" type="radio" name="relax" value="Reading">

                    <label for="walk">Going for a walk</label>
                    <input id="walk" type="radio" name="relax" value="Going for a walk">
                </fieldset>
                <fieldset>
                    <?php
                        if (array_key_exists('travel', $errors)) {
                            echo '<p style="color:red">' . $errors['travel'] . '</p>';
                        }
                    ?>
                    <legend>14. How often do you travel?</legend>

                    <label for="travel_often">Very often</label>
                    <input id="travel_often" type="radio" name="travel" value="Very often">

                    <label for="travel_sometimes">Sometimes in year</label>
                    <input id="travel_sometimes" type="radio" name="travel" value="Sometimes in year">

                    <label for="travel_yearly">Once a year</label>
                    <input id="travel_yearly" type="radio" name="travel" value="Once a year">

                    <label for="travel_rarely">Rarely</label>
                    <input id="travel_rarely" type="radio" name="travel" value="Rarely">
                </fieldset>

                <fieldset>
                    <?php
                        if (array_key_exists('weekend', $errors)) {
                            echo '<p style="color:red">' . $errors['weekend'] . '</p>';
                        }
                    ?>
                    <legend>15. How do you usually spend your weekends?</legend>

                    <label for="stay_home">Staying at home</label>
                    <input id="stay_home" type="radio" name="weekend" value="Staying at home">

                    <label for="weekend_friends">Meeting friends</label>
                    <input id="weekend_friends" type="radio" name="weekend" value="Meeting friends">

                    <label for="weekend_outdoors">Going outdoors</label>
                    <input id="weekend_outdoors" type="radio" name="weekend" value="Going outdoors">

                    <label for="weekend_shopping">Shopping or entertainment</label>
                    <input id="weekend_shopping" type="radio" name="weekend" value="Shopping or entertainment">
                </fieldset>
        </section>
        <section class="form-section">
                <h2>Additional Information</h2>
                <div>
                    <?php
                        if (array_key_exists('telephone', $errors)) {
                            echo '<p style="color:red">' . $errors['telephone'] . '</p>';
                        }
                    ?>
                <label for="telephone">16. What's your phone number?</label>
                <input id="telephone" name="telephone" type="tel" placeholder="222 222 2222"
                    <?php
                        if (count($errors) > 0 && $submittedTEL) {
                            echo 'value="' . $submittedTEL . '"';
                        }
                    ?>
                >
                </div>
                <div>
                    <?php
                        if (array_key_exists('birth_date', $errors)) {
                            echo '<p style="color:red">' . $errors['birth_date'] . '</p>';
                        }
                    ?>
                <label for="birth_date">17. What's your date of birth?</label>
                <input id="birth_date" name="birth_date" type="date"
                    <?php
                        if (count($errors) > 0 && $submittedBT) {
                            echo 'value="' . $submittedBT . '"';
                        }
                    ?>
                >
                </div>
                <div>
                    <?php
                        if (array_key_exists('preferred_color', $errors)) {
                            echo '<p style="color:red">' . $errors['preferred_color'] . '</p>';
                        }
                    ?>
                <label for="preferred_color">18. What's your favourite colour?</label>
                <input id="preferred_color" name="preferred_color" type="color"
                    <?php
                        if (count($errors) > 0 && $submittedColor) {
                            echo 'value="' . $submittedColor . '"';
                        }
                    ?>
                >
                </div>
        </section>

        <footer>
            <button type="submit">Send</button>
        </footer>
    </form>
    </main>
    
</body>
</html>