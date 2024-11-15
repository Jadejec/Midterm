<?php
session_start();

// Check if the students array is set in the session
if (isset($_SESSION['students'])) {
    $students = $_SESSION['students'];
} else {
    $students = array();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // Check if student ID is unique
    $is_duplicate = false;
    foreach ($students as $student) {
        if ($student['student_id'] == $student_id) {
            $is_duplicate = true;
            break;
        }
    }
    if ($is_duplicate) {
        echo "<script>alert('Error: Student ID already exists. Please use a unique Student ID.');</script>";
    } else {
        // Add new student
        $students[] = array(
            'student_id' => $student_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
        );
        $_SESSION['students'] = $students;
        echo "Student added successfully.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1>Register a New Student</h1>
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Register Student</li>
  </ol>
</nav>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="number" class="form-control" id="student_id" name="student_id" placeholder = "Enter Student ID"required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder = "Enter First Name"required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder = "Enter Last Name"required>
                
            </div>
           
            
            <button type="submit" class="btn btn-primary">Add Student</button>
        </form>

        <?php if (count($students) > 0): ?>
            <h2>Student List</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Option</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $key => $student): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($student["student_id"]); ?></td>
                            <td><?php echo htmlspecialchars($student["first_name"]); ?></td>
                            <td><?php echo htmlspecialchars($student["last_name"]); ?></td>
                            <td>
                    <div class='d-grid gap-2 d-md-block'>
                        <a href="./edit.php?student_key=<?php echo $key; ?>" class='btn btn-primary'>Edit</a>
                       
                        <a href="./delete.php" class='btn btn-danger'>Delete</a>
                    </div>
                </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
