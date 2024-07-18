<?php
class Auth {
    private $dbLogic;

    // Constructor to initialize the DbLogic object
    public function __construct($dbLogic) {
        $this->dbLogic = $dbLogic;
    }

    // Register function to create a new user
    public function register($fName, $lName, $username, $password) {

        // Validate password (simple example: length check)
        if (strlen($password) < 8) {
            return "Password must be at least 8 characters long.";
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Use DbLogic to insert the user
        return $this->dbLogic->insertUser($fName, $lName, $username, $hashedPassword);
    }

    // Login function to authenticate a user
    public function login($username, $password) {

        // Use DbLogic to get the stored hashed password and name
        $user = $this->dbLogic->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            
            return "Login successful. Welcome, " . $_SESSION['username'] . "!";
        } else {
            return "Invalid username or password.";
        }
    }
}
?>
