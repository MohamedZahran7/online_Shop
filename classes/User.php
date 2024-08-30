<?php
require_once "MySql.php";

class User extends MySql {
    
    public function register($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (`username`, `password`) VALUES ('$username', '$hashedPassword')";

        $result = mysqli_query($this->Connection, $query);
        return $result ? true : false;
    }

    public function userExists($username) {
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($this->Connection, $query);
        
        return mysqli_num_rows($result) > 0; 
    }


    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE `username` = '$username'";
        $result = mysqli_query($this->Connection, $query);

        if ($result && mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
}