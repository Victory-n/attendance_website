<?php
class Student {
    private $pdo;
    private $officeLat = 12.457851;
    private $officeLng = 74.005974;
    private $acceptableDistance = 0.1;

    // Constructor to initialize the PDO object
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Insert function to add a new student to the database
    public function createStudent($fName, $lName, $username, $email, $password) {
        try {
            // Prepare and execute the SQL statement
            $stmt = $this->pdo->prepare("INSERT INTO `students` (fName, lName, username, email, password) VALUES (:fName, :lName, :username, :email, :password)");
            $stmt->bindParam(':fName', $fName);
            $stmt->bindParam(':lName', $lName);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            if ($stmt->execute()) {
                return "Registration successful.";
            } else {
                return "Error: " . $stmt->errorInfo()[2];
            }
        } catch (PDOException $e) {
            return "Database error: " . $e->getMessage();
        }
    }

    // Fetch the hashed password and name for the given email
    public function getUserByUsername($username) {
        try {
            $stmt = $this->pdo->prepare("SELECT id, username, password FROM `students` WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    // Function to calculate the distance between two coordinates using Haversine formula
    private function calculateDistance($lat1, $lng1, $lat2, $lng2) {
        $earthRadius = 6371; // Earth's radius in kilometers

        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * 
             sin($dLng / 2) * sin($dLng / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }

    // Function to mark attendance for a student
    public function markAttendance($studentId, $courseId, $studentLat, $studentLng) {
        try {
            $distance = $this->calculateDistance($this->officeLat, $this->officeLng, $studentLat, $studentLng);

            if ($distance <= $this->acceptableDistance) {
                // Prepare and execute the SQL statement to mark attendance
                $stmt = $this->pdo->prepare("INSERT INTO attendance (studentId, courseId, status) VALUES (:studentId, :courseId, 1)
                                            ON DUPLICATE KEY UPDATE status = 1");
                $stmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);
                $stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    return "Attendance marked successfully.";
                } else {
                    return "Error: " . $stmt->errorInfo()[2];
                }
            } else {
                return "You are not at the office location or nearby.";
            }
        } catch (PDOException $e) {
            // Log the error if needed
            error_log($e->getMessage());
            return "Database error: " . $e->getMessage();
        }
    }
}
?>