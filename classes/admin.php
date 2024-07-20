<?php
class DbLogic {
    private $pdo;

    // Constructor to initialize the PDO object
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Insert function to add a new user to the database
    public function addStudents($names) {
        try {
            // Prepare an SQL statement for inserting names into the database
            $stmt = $this->pdo->prepare("INSERT INTO students (name) VALUES (:name)");
            
            // Split the input string by commas and trim any extra whitespace
            $namesArray = array_map('trim', explode(',', $names));
            
            // Process each name and insert it into the database
            foreach ($namesArray as $name) {
                if (!empty($name)) {
                    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                    $stmt->execute();
                }
            }

            return true;
        } catch (PDOException $e) {
            return "Database error: " . $e->getMessage();
        }
    }

    public function deleteStudent($id) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM `students` WHERE `id` = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            // Log the error if needed
            error_log($e->getMessage());
            return false;
        }
    }

    // Function to fetch all courses
    public function getAllCourses() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM courses");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Database error: " . $e->getMessage();
        }
    }

    //Function to add courses
    public function addCourses(array $courses) {
        try {
            // Prepare the SQL statement
            $stmt = $this->pdo->prepare(
                "INSERT INTO courses (name, days, startTime, stopTime) 
                VALUES (:name, :days, :startTime, :stopTime)"
            );

            $checkStmt = $this->pdo->prepare(
                "SELECT 1 FROM courses WHERE name = :name AND days = :days AND startTime = :startTime AND stopTime = :stopTime"
            );
    
            // Begin transaction
            $this->pdo->beginTransaction();
    
            foreach ($courses as $course) {
                // Convert the days array to a JSON string
                $daysJson = json_encode($course['days']);
    
                // Check if the course already exists
                $checkStmt->bindParam(':name', $course['name']);
                $checkStmt->bindParam(':days', $daysJson);
                $checkStmt->bindParam(':startTime', $course['startTime']);
                $checkStmt->bindParam(':stopTime', $course['stopTime']);

                $checkStmt->execute();

                if ($checkStmt->rowCount() > 0) {
                    // Course already exists, skip it
                    continue;
                }
    
                $stmt->bindParam(':name', $course['name']);
                $stmt->bindParam(':days', $daysJson);
                $stmt->bindParam(':startTime', $course['startTime']);
                $stmt->bindParam(':stopTime', $course['stopTime']);
    
                if (!$stmt->execute()) {
                    // Rollback if any insert fails
                    $this->pdo->rollBack();
                    return "Error: ". $stmt->errorInfo()[2];
                }
            }
    
            // Commit transaction
            $this->pdo->commit();
            return "All courses added successfully.";
        } catch (PDOException $e) {
            // Rollback if an exception occurs
            $this->pdo->rollBack();
            return "Database error: ". $e->getMessage();
        }
    }
}
?>
