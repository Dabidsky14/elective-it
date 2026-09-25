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
    <main class="page-shell">
        <section class="signup-card" aria-labelledby="page-title">
            <div class="card-accent"></div>

            <header class="card-header">
                <h1 class="page-title" id="page-title">Create an account</h1>
            </header>

            <form class="signup-form" action="register_process.php" method="post">
                <fieldset class="form-section">
                    <legend>Personal information</legend>

                    <div class="form-grid form-grid-two">
                        <div class="form-field">
                            <label for="given-name">First name</label>
                            <input
                                type="text"
                                id="given-name"
                                name="fname"
                                class="form-control"
                                placeholder="Juan"
                                required
                            >
                        </div>

                        <div class="form-field">
                            <label for="family-name">Last name</label>
                            <input
                                type="text"
                                id="family-name"
                                name="lname"
                                class="form-control"
                                placeholder="Dela Cruz"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-field email-field">
                        <label for="email-address">Email address</label>
                        <input
                            type="email"
                            id="email-address"
                            name="email"
                            class="form-control"
                            placeholder="you@email.com"
                            required
                        >
                    </div>
                </fieldset>

                <fieldset class="form-section">
                    <legend>Security</legend>

                    <div class="form-stack">
                        <div class="form-field">
                            <label for="new-password">Password</label>
                            <div class="password-control">
                                <input
                                    type="password"
                                    id="new-password"
                                    name="password"
                                    class="form-control"
                                    placeholder="5–20 characters"
                                    minlength="5"
                                    maxlength="20"
                                    required
                                >
                                <button class="password-toggle" type="button" data-target="new-password">Show</button>
                            </div>
                            <p class="helper-text">Use uppercase, lowercase, and a number.</p>
                        </div>

                        <div class="form-field">
                            <label for="repeat-password">Confirm password</label>
                            <div class="password-control">
                                <input
                                    type="password"
                                    id="repeat-password"
                                    name="cpassword"
                                    class="form-control"
                                    placeholder="Repeat your password"
                                    minlength="5"
                                    maxlength="20"
                                    required
                                >
                                <button class="password-toggle" type="button" data-target="repeat-password">Show</button>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-section">
                    <legend>Additional details</legend>

                    <div class="form-grid form-grid-two">
                        <div class="form-field">
                            <label for="birth-date">Birthday</label>
                            <input
                                type="date"
                                id="birth-date"
                                name="birthday"
                                class="form-control"
                                required
                            >
                        </div>

                        <div class="form-field">
                            <label for="course-choice">Course</label>
                            <select
                                id="course-choice"
                                name="course"
                                class="form-select"
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

                    <div class="form-field gender-field">
                        <span class="field-label">Gender</span>
                        <div class="choice-list">
                            <label class="choice" for="gender-male">
                                <input type="radio" id="gender-male" name="gender" value="Male" required>
                                <span>Male</span>
                            </label>

                            <label class="choice" for="gender-female">
                                <input type="radio" id="gender-female" name="gender" value="Female">
                                <span>Female</span>
                            </label>

                            <label class="choice" for="gender-other">
                                <input type="radio" id="gender-other" name="gender" value="Other">
                                <span>Other</span>
                            </label>
                        </div>
                    </div>
                </fieldset>

                <button class="submit-button" type="submit">Create account</button>
            </form>
        </section>
    </main>

    <script>
        document.querySelectorAll(".password-toggle").forEach(function (toggleButton) {
            toggleButton.addEventListener("click", function () {
                var passwordField = document.getElementById(toggleButton.dataset.target);

                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    toggleButton.textContent = "Hide";
                } else {
                    passwordField.type = "password";
                    toggleButton.textContent = "Show";
                }
            });
        });
    </script>
</body>
</html>
