<?php
include '../Includes/dbcon.php';
include '../Includes/session.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $admissionNumber = $_POST['admissionNumber'];
    $dateTimeTaken = $_POST['dateTimeTaken'];
    $status = $_POST['status'];

    $classId = $_SESSION['classId'];
    $classArmId = $_SESSION['classArmId'];

    $sql = "INSERT INTO tblattendance (admissionNo, classId, classArmId, dateTimeTaken, status) 
            VALUES ('$admissionNumber', '$classId', '$classArmId', '$dateTimeTaken', '$status')
            ON DUPLICATE KEY UPDATE status='$status'";

    if (mysqli_query($conn, $sql)) {
        echo "Attendance recorded successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
