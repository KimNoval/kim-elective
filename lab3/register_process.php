<?php

function prepareInput($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);

    return $value;
}

function escapeHtml($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8', false);
}

$firstName = prepareInput($_POST['fname'] ?? '');
$lastName = prepareInput($_POST['lname'] ?? '');
$emailAddress = prepareInput($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['cpassword'] ?? '';
$birthDate = prepareInput($_POST['birthday'] ?? '');
$gender = prepareInput($_POST['gender'] ?? '');
$course = prepareInput($_POST['course'] ?? '');

$password = is_string($password) ? $password : '';
$confirmPassword = is_string($confirmPassword) ? $confirmPassword : '';

$resultTitle = 'Account Details';
$resultMessage = 'Your information is valid. Nothing was saved yet.';
$showAccountDetails = false;
$passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{5,20}$/';

if (
    $firstName === '' ||
    $lastName === '' ||
    $emailAddress === '' ||
    $password === '' ||
    $confirmPassword === '' ||
    $birthDate === '' ||
    $gender === '' ||
    $course === ''
) {
    $resultTitle = 'Missing Information';
    $resultMessage = 'Please fill in all the fields.';
} elseif ($password !== $confirmPassword) {
    $resultTitle = 'Passwords Do Not Match';
    $resultMessage = 'Please check your password confirmation.';
} elseif (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
    $resultTitle = 'Invalid Email';
    $resultMessage = 'Please enter a valid email address.';
} elseif (!preg_match($passwordPattern, prepareInput($password))) {
    $resultTitle = 'Password Not Accepted';
    $resultMessage = 'Use 5 to 20 letters and numbers, with uppercase, lowercase, and a number.';
} else {
    $showAccountDetails = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= escapeHtml($resultTitle) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container py-5 page-container">
        <div class="row justify-content-center w-100">
            <div class="col-lg-7">
                <section class="card form-card" aria-labelledby="result-heading">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="h3" id="result-heading"><?= escapeHtml($resultTitle) ?></h1>
                        <p class="text-secondary"><?= escapeHtml($resultMessage) ?></p>

                        <?php if ($showAccountDetails): ?>
                            <dl class="row mb-4">
                                <dt class="col-sm-4">Full name</dt>
                                <dd class="col-sm-8"><?= escapeHtml($firstName . ' ' . $lastName) ?></dd>

                                <dt class="col-sm-4">Email</dt>
                                <dd class="col-sm-8"><?= escapeHtml($emailAddress) ?></dd>

                                <dt class="col-sm-4">Birthday</dt>
                                <dd class="col-sm-8"><?= escapeHtml($birthDate) ?></dd>

                                <dt class="col-sm-4">Gender</dt>
                                <dd class="col-sm-8"><?= escapeHtml($gender) ?></dd>

                                <dt class="col-sm-4">Course</dt>
                                <dd class="col-sm-8"><?= escapeHtml($course) ?></dd>
                            </dl>
                        <?php endif; ?>

                        <a class="btn back-button" href="register.php">Back to form</a>
                    </div>
                </section>
            </div>
        </div>
    </main>
</body>
</html>
