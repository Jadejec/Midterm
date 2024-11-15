<?php
session_start();



$students = $_SESSION['students'];
// Check if the students array exists in the session
$students = isset($_SESSION['students']) ? $_SESSION['students'] : [];
 // Check if a student key was passed in the URL
if (isset($_GET['student_key'])) {
    $student_key = $_GET['student_key'];

    // Check if the student exists in the array
    if (isset($students[$student_key])) {
        $student = $students[$student_key];
    } 
} 

// If the form is submitted to delete the student
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Remove student from the array
    unset($students[$student_key]);

    // Update the session with the modified students array
    $_SESSION['students'] = array_values($students); // Re-index array

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