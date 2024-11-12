<?php
session_start();


// Check if the students array is set in the session
if (isset($_SESSION['students'])) {
    $students = $_SESSION['students'];
} else {
    // Initialize $students as an empty array if not set
    $students = array();
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
       
        <?php if (count($students) > 0): ?>
            <?php foreach ($students as $key => $student): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <form method="post" action="update_student.php"> <!-- Assume this is the script to handle updates -->
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="student_id_<?php echo $key; ?>">Student ID</label>
                                    <input type="text" class="form-control" id="student_id_<?php echo $key; ?>" name="student_id" value="<?php echo htmlspecialchars($student['student_id']); ?>" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="first_name_<?php echo $key; ?>">First Name</label>
                                    <input type="text" class="form-control" id="first_name_<?php echo $key; ?>" name="first_name" value="<?php echo htmlspecialchars($student['first_name']); ?>" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="last_name_<?php echo $key; ?>">Last Name</label>
                                    <input type="text" class="form-control" id="last_name_<?php echo $key; ?>" name="last_name" value="<?php echo htmlspecialchars($student['last_name']); ?>" required>
                                </div>
                            </div>
                            <!-- Hidden field to pass the student key (or ID) to the update script -->
                            <input type="hidden" name="student_key" value="<?php echo $key; ?>">
                            <button type="submit" class="btn btn-primary">Update Student</button>
                            
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No students available to edit.</p>
        <?php endif; ?>
    </div>

</body>
</html>
