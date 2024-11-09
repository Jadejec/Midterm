<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Login Form -->
    <div class="card shadow-lg mb-4">
        <div class="card-body">
            <h5 class="card-title text-center">Login</h5>

            <!-- Error Alert Box (Hidden Initially) -->
            <div id="errorAlert" class="alert alert-danger d-none" role="alert">
                <strong>System Error:</strong> Please provide both email and password.
            </div>

            <!-- Login Form -->
            <form id="loginForm" class="needs-validation" novalidate >
                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    <div class="invalid-feedback">
                        Please provide a valid email address.
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
                    <div class="invalid-feedback">
                        Password is required.
                    </div>
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>


<!-- Bootstrap 5 JS (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom Validation Script -->
<script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();  // Prevent form submission
        
        var email = document.getElementById('email');
        var password = document.getElementById('password');
        var errorAlert = document.getElementById('errorAlert');

        // Reset error state
        email.classList.remove('is-invalid');
        password.classList.remove('is-invalid');
        errorAlert.classList.add('d-none');  

        var isValid = true;

        // Validate Email
        if (!email.value) {
            email.classList.add('is-invalid');
            isValid = false;
        }

        // Validate Password
        if (!password.value) {
            password.classList.add('is-invalid');
            isValid = false;
        }

        // If valid, redirect to the next page
        if (isValid) {
            // Redirect to the main page after successful login
            window.location.href = 'dashboard.php';  // Redirect to main page (this can be modified based on your needs)
        } else {
            // Show error alert if validation fails
            errorAlert.classList.remove('d-none');
        }
    });
</script>



</body>
</html>
