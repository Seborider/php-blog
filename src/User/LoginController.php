<?php

namespace App\User;

use App\Core\AbstractController;

class LoginController extends AbstractController 
{
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }
       
    public function dashboard()
    {
        if (isset($_SESSION["login"])) {
            echo "User logged in!";
        } else {
            header("Location: login");
        }
    }

    public function logout()
    {
       unset($_SESSION["login"]);
       session_regenerate_id(true);
       header("Location: login");
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
                header("Location: dashboard");
            return;
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