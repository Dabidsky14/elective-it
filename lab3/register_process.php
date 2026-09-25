<?php

function cleanInput($inputValue)
{
    $inputValue = trim($inputValue);
    $inputValue = stripslashes($inputValue);
    $inputValue = htmlspecialchars($inputValue);

    return $inputValue;
}

function escapeOutput($outputValue)
{
    return htmlspecialchars((string) $outputValue, ENT_QUOTES, 'UTF-8', false);
}

$givenName = cleanInput($_POST['fname'] ?? '');
$familyName = cleanInput($_POST['lname'] ?? '');
$userEmail = cleanInput($_POST['email'] ?? '');
$newPassword = $_POST['password'] ?? '';
$confirmedPassword = $_POST['cpassword'] ?? '';
$dateOfBirth = cleanInput($_POST['birthday'] ?? '');
$userGender = cleanInput($_POST['gender'] ?? '');
$selectedCourse = cleanInput($_POST['course'] ?? '');

$newPassword = is_string($newPassword) ? $newPassword : '';
$confirmedPassword = is_string($confirmedPassword) ? $confirmedPassword : '';

$pageHeading = 'Account Details';
$pageNotice = 'Your information is valid. Nothing was saved yet.';
$displayAccount = false;
$passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{5,20}$/';

if (
    $givenName === '' ||
    $familyName === '' ||
    $userEmail === '' ||
    $newPassword === '' ||
    $confirmedPassword === '' ||
    $dateOfBirth === '' ||
    $userGender === '' ||
    $selectedCourse === ''
) {
    $pageHeading = 'Missing Information';
    $pageNotice = 'Please fill in all the fields.';
} elseif ($newPassword !== $confirmedPassword) {
    $pageHeading = 'Passwords Do Not Match';
    $pageNotice = 'Please check your password confirmation.';
} elseif (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
    $pageHeading = 'Invalid Email';
    $pageNotice = 'Please enter a valid email address.';
} elseif (!preg_match($passwordPattern, cleanInput($newPassword))) {
    $pageHeading = 'Password Not Accepted';
    $pageNotice = 'Use 5 to 20 letters and numbers, with uppercase, lowercase, and a number.';
} else {
    $displayAccount = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= escapeOutput($pageHeading) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="page-shell">
        <section class="result-card" aria-labelledby="result-heading">
            <div class="card-accent"></div>

            <div class="result-content">
                <h1 class="page-title" id="result-heading"><?= escapeOutput($pageHeading) ?></h1>
                <p class="page-subtitle"><?= escapeOutput($pageNotice) ?></p>

                <?php if ($displayAccount): ?>
                    <div class="account-details">
                        <p>
                            <strong>Full name:</strong>
                            <span><?= escapeOutput($givenName . ' ' . $familyName) ?></span>
                        </p>
                        <p>
                            <strong>Email:</strong>
                            <span><?= escapeOutput($userEmail) ?></span>
                        </p>
                        <p>
                            <strong>Birthday:</strong>
                            <span><?= escapeOutput($dateOfBirth) ?></span>
                        </p>
                        <p>
                            <strong>Gender:</strong>
                            <span><?= escapeOutput($userGender) ?></span>
                        </p>
                        <p>
                            <strong>Course:</strong>
                            <span><?= escapeOutput($selectedCourse) ?></span>
                        </p>
                    </div>
                <?php endif; ?>

                <a href="register.php" class="back-button">Back to form</a>
            </div>
        </section>
    </main>
</body>
</html>
