<?php
require_once __DIR__ .  "/../Config/Database.php";

class User 
{
    private $connect;
    public function __construct() {
        $this->connect = Database::getConnection();
    }
    public function registration()
    {
        if (isset($_POST["submit"])) {
           $name = $_POST["name"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($name) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"Semua kolom harus diisi");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email tidak valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password harus panjang 8 charactes");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password tidak sama");
           }
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = $this->connect->query($sql);
           $rowCount = $result->num_rows;
           if ($rowCount>0) {
            array_push($errors,"Email sudah dipakai");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (name, email, password) VALUES ( ?, ?, ? )";
            $stmt = $this->connect->stmt_init();
            $prepareStmt = $stmt->prepare($sql);
            if ($prepareStmt) {
                $stmt->bind_param("sss",$name, $email, $passwordHash);
                $stmt->execute();
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
        }
    }

}
