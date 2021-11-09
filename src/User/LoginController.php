<?php

namespace App\User;

use App\Core\AbstractController;

class LoginController extends AbstractController 
{
    public function __construct(UsersRepository $usersRepository)
    {
        if (isset($_SESSION["login"])) {
            echo "User logged in!";
        } else {
            echo "User not logged in!";
        }
    }

    public function dashboard()
    {
        $this->render('user/dashboard.php');
    }

    public function login()
    {
        $error = null;
        if (!empty($_POST["username"]) AND (!empty($_POST["password"]))) {
            $username = $_POST["username"];
            $password = $_POST["password"];
        
        $user = $this->usersRepository->findByUsername($username);

        if (!empty($user)) {
            if (password_verify($password, $user->password)) {
                $_SESSION["login"] = $user->username;
                session_regenerate_id(true);
                echo "Login successful!";
                die();
            } else {
                $error = "Wrong password!";
            }

        } else {
            $error = "User not found.";
        }
        }
        $this->render('user/login', [
            "error" => $error,
        ]);
    }
}

?>