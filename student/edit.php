<?php
session_start();


// Check if the students array is set in the session
if (isset($_SESSION['students'])) {
    $students = $_SESSION['students'];
} else {
    // Initialize $students as an empty array if not set
    $students = array();
}
// Check if a student key was passed in the URL
if (isset($_GET['student_key'])) {
    $student_key = $_GET['student_key'];

    // Check if the student exists in the array
    if (isset($students[$student_key])) {
        $student = $students[$student_key];
    } else {
        echo "Student not found.";
        exit;
    }
} else {
    echo "No student specified.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container my-4">
    <h2>Edit Student List</h2>
        <!-- Breadcrumb Navigation -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="./register.php">Register Student</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Student</li>
            </ol>
        </nav>

        <!-- Edit Student List -->
        <div class="card mb-3">
        <div class="card-body">
            <form method="post" action="update_student.php"> <!-- Assume this is the script to handle updates -->
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="student_id">Student ID</label>
                        <input type="text" class="form-control" id="student_id" name="student_id" value="<?php echo htmlspecialchars($student['student_id']); ?>" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($student['first_name']); ?>" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo htmlspecialchars($student['last_name']); ?>" required>
                    </div>
                </div>
                <!-- Hidden field to pass the student key to the update script -->
                <input type="hidden" name="student_key" value="<?php echo $student_key; ?>">
                <button type="submit" class="btn btn-primary">Update Student</button>
            </form>
        </div>
    </div>
    </div>

</body>
</html>
