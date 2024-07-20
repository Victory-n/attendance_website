<?php
class Auth {
    private $student;

    // Constructor to initialize the Student object
    public function __construct($student) {
        $this->student = $student;
    }

    // Register function to create a new user
    public function register($fName, $lName, $username, $email, $password) {

        // Validate password (simple example: length check)
        if (strlen($password) < 8) {
            return "Password must be at least 8 characters long.";
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Use Student to create the student
        return $this->student->createStudent($fName, $lName, $username, $email, $hashedPassword);
    }

    // Login function to authenticate a user
    public function login($username, $password) {

        // Use Student to get the stored hashed password and username
        $user = $this->student->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            
            return "Login successful. Welcome, " . $_SESSION['username'] . "!";
        } else {
            return "Invalid username or password.";
        }
    }
}
?>