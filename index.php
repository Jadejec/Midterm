<?php
session_start();


$error_message = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);


    if (empty($email) || empty($password)) {
        $error_message = "Email and Password are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } else {
        // Hardcoded credentials for demonstration
        $validEmail = "user1@email.com";
        $validPassword = "password";

        if ($email === $validEmail && $password === $validPassword) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = $email;
            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Invalid email or password.";
        }
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .login-container {
            max-width: 400px;
            margin: auto;
            padding-top: 100px;
        }
    </style>
</head>
<body>
    
<div class="login-container">
<?php if ($error_message): ?>
                <div class="alert alert-danger">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-center">Login</h3>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    // Disable the back button to prevent navigation after logout
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>

</body>
</html>
