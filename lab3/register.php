<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container py-5 page-container">
        <div class="row justify-content-center w-100">
            <div class="col-lg-7">
                <section class="card form-card" aria-labelledby="page-title">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="h3 mb-4" id="page-title">Create an account</h1>

                        <form action="register_process.php" method="post">
                            <fieldset class="mb-4">
                                <legend class="h6 text-secondary mb-3">Personal information</legend>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="first-name">First name</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="first-name"
                                            name="fname"
                                            placeholder="Juan"
                                            required
                                        >
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="last-name">Last name</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="last-name"
                                            name="lname"
                                            placeholder="Dela Cruz"
                                            required
                                        >
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label class="form-label" for="email-address">Email address</label>
                                    <input
                                        class="form-control"
                                        type="email"
                                        id="email-address"
                                        name="email"
                                        placeholder="you@email.com"
                                        required
                                    >
                                </div>
                            </fieldset>

                            <fieldset class="mb-4">
                                <legend class="h6 text-secondary mb-3">Security</legend>

                                <div class="mb-3">
                                    <label class="form-label" for="new-password">Password</label>
                                    <div class="input-group">
                                        <input
                                            class="form-control"
                                            type="password"
                                            id="new-password"
                                            name="password"
                                            placeholder="5–20 characters"
                                            minlength="5"
                                            maxlength="20"
                                            required
                                        >
                                        <button
                                            class="btn btn-outline-secondary password-toggle"
                                            type="button"
                                            data-target="new-password"
                                        >Show</button>
                                    </div>
                                    <div class="form-text">Use uppercase, lowercase, and a number.</div>
                                </div>

                                <div>
                                    <label class="form-label" for="repeat-password">Confirm password</label>
                                    <div class="input-group">
                                        <input
                                            class="form-control"
                                            type="password"
                                            id="repeat-password"
                                            name="cpassword"
                                            placeholder="Repeat your password"
                                            minlength="5"
                                            maxlength="20"
                                            required
                                        >
                                        <button
                                            class="btn btn-outline-secondary password-toggle"
                                            type="button"
                                            data-target="repeat-password"
                                        >Show</button>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="mb-4">
                                <legend class="h6 text-secondary mb-3">Additional details</legend>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="birth-date">Birthday</label>
                                        <input
                                            class="form-control"
                                            type="date"
                                            id="birth-date"
                                            name="birthday"
                                            required
                                        >
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="course-choice">Course</label>
                                        <select
                                            class="form-select"
                                            id="course-choice"
                                            name="course"
                                            required
                                        >
                                            <option value="" selected disabled>Select course</option>
                                            <option value="Bachelor of Information Technology">BSIT</option>
                                            <option value="Bachelor of Education">BSED</option>
                                            <option value="Criminology">BSCRIM</option>
                                            <option value="Bachelor of Computer Science">BSCS</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <span class="form-label d-block mb-2">Gender</span>
                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            id="gender-male"
                                            name="gender"
                                            value="Male"
                                            required
                                        >
                                        <label class="form-check-label" for="gender-male">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            id="gender-female"
                                            name="gender"
                                            value="Female"
                                        >
                                        <label class="form-check-label" for="gender-female">Female</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            id="gender-other"
                                            name="gender"
                                            value="Other"
                                        >
                                        <label class="form-check-label" for="gender-other">Other</label>
                                    </div>
                                </div>
                            </fieldset>

                            <button class="btn register-button" type="submit">Create account</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script>
        const passwordButtons = document.querySelectorAll(".password-toggle");

        passwordButtons.forEach(function (passwordButton) {
            passwordButton.addEventListener("click", function () {
                const passwordInput = document.getElementById(passwordButton.dataset.target);
                const shouldShowPassword = passwordInput.type === "password";

                passwordInput.type = shouldShowPassword ? "text" : "password";
                passwordButton.textContent = shouldShowPassword ? "Hide" : "Show";
            });
        });
    </script>
</body>
</html>
