<?php
require_once __DIR__ .  "/../Config/Database.php";
class Login
{
    private $connect;
    public function __construct() {
        $this->connect = Database::getConnection();
    }

    public function cekUser()
    {
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
             $sql = "SELECT * FROM users WHERE email = '$email'";
             $result = $this->connect->query($sql);
             $user = $result->fetch_array(MYSQLI_ASSOC);
             if ($user) {
                 if (password_verify($password, $user["password"])) {
                     session_start();
                     $_SESSION["user"] = $user['name'];
                     header("Location: home.php");
                     die();
                 }else{
                     echo "<div class='alert alert-danger'>Email atau Password Salah</div>";
                 }
             }else{
                 echo "<div class='alert alert-danger'>Email atau Password Salah</div>";
             }
         }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: login.php");
    }

}