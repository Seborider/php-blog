<?php

namespace App\User;

use App\Core\AbstractController;

class LoginController extends AbstractController 
{
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function login()
    {
        $error = null;
        if (!empty($_POST["username"]) AND (!empty($_POST["password"]))) {
            $username = $_POST["username"];
            $password = $_POST["password"];
        
        $user = $this->usersRepository->findByUsername($username);

        if (!empty($user)) {
            if ($user->password == $password) {
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