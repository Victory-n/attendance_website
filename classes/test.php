<?php
include 'student.php';
include 'db-logic.php';


// Initialize the DbLogic class
$dbLogic = new DbLogic($pdo);


$studentId = 1;
$courseId = 1;
$studentLat = 40.712776;
$studentLng = -74.005974;

echo $dbLogic->markAttendance($studentId, $courseId, $studentLat, $studentLng);
?>