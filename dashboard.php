<?php
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <!-- Welcome Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
           <?php
        echo "<b><h3>Welcome to the System: " . htmlspecialchars($_SESSION['user'] ?? ''). '</b>' .'</h3>';
?>
</h1>
    <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>

        <!-- Add Subject Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>Add Subject</h2>
            </div>
            <div class="card-body">
                <p>Use the button below to add a new subject.</p>
                <button class="btn btn-primary"  disabled>Add Subject</button>
            </div>
        </div>

        <!-- Register Student Section -->
        <div class="card">
            <div class="card-header">
                <h2>Register a Student</h2>
            </div>
            <div class="card-body">
                <p>Use the button below to register a new student.</p>
                <a href="./student/register.php" class="btn btn-success">Register Student</a>
            </div>
        </div>
    </div>
    <?php include "./footer.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
