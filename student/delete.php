<?php
session_start();

// Check if the students array exists in the session
if (!isset($_SESSION['students'])) {
    echo "No student data found in the session.";
    exit();
}

$students = $_SESSION['students'];

// Get the student key from URL and validate it
if (isset($_GET['key']) && array_key_exists($_GET['key'], $students)) {
    $key = $_GET['key'];
    $student = $students[$key];
}
 else {
    // Show an error message if the key is invalid
    echo "Student not found. Please check if the key is valid and try again.";
    exit();
}

// If the form is submitted to delete the student
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Remove student from the array
    unset($students[$key]);
    $_SESSION['students'] = $students; // Update session

    // Redirect back to register.php after deletion
    header("Location: register.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete a Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-4">
        <h2>Delete a Student</h2>
        
        <!-- Breadcrumb Navigation -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="register.php">Register Student</a></li>
                <li class="breadcrumb-item active" aria-current="page">Delete Student</li>
            </ol>
        </nav>

        <!-- Confirmation Box -->
        <div class="card">
            <div class="card-body">
                <p>Are you sure you want to delete the following student record?</p>
                <ul>
                    <li><strong>Student ID:</strong> <?php echo isset($student['student_id']) ? htmlspecialchars($student['student_id']) : 'N/A'; ?></li>
                    <li><strong>First Name:</strong> <?php echo isset($student['first_name']) ? htmlspecialchars($student['first_name']) : 'N/A'; ?></li>
                    <li><strong>Last Name:</strong> <?php echo isset($student['last_name']) ? htmlspecialchars($student['last_name']) : 'N/A'; ?></li>
                </ul>
                <form method="post">
                    <a href="register.php" class="btn btn-secondary">Cancel</a>
                    <button type="submit" name="delete" class="btn btn-danger">Delete Student Record</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
