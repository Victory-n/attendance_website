<?php
include 'classes/admin.php';
include 'classes/db-logic.php';

// Read JSON file
$jsonData = file_get_contents('courses.json');
$courses = json_decode($jsonData, true);

// Initialize the DbLogic class
$dbLogic = new DbLogic($pdo);

// Debugging: Print the courses array
echo "<pre>";
print_r($courses);
echo "</pre>";

// Add courses
$result = $dbLogic->addCourses($courses);

// Debugging: Print the result
echo $result;
?>
