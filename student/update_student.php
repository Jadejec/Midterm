<?php
session_start();

// Check if the students array and the student key are set in the session and form data
if (isset($_SESSION['students']) && isset($_POST['student_key'])) {
    $students = $_SESSION['students'];
    $student_key = $_POST['student_key'];

    // Update the student details
    if (isset($students[$student_key])) {
        $students[$student_key]['first_name'] = $_POST['first_name'];
        $students[$student_key]['last_name'] = $_POST['last_name'];
    }

    // Save the updated students array back into the session
    $_SESSION['students'] = $students;
}

// Redirect to register.php after updating
header("Location: register.php");
exit();
