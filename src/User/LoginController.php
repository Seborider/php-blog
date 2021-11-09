<?php

namespace App\User;

use App\Core\AbstractController;

class LoginController extends AbstractController 
{
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }
       
    public function dashboard()
    {
        $this->loginService->check();
    }

    public function logout()
    {
        $this->loginService->logout();
       header("Location: login");
    }

    public function login()
    {
        $error = null;
        if (!empty($_POST["username"]) AND (!empty($_POST["password"]))) {
            $username = $_POST["username"];
            $password = $_POST["password"];
        

            if ($this->loginService->attempt($username, $password)) {
                header("Location: dashboard");
                return;
            } else {
                $error = "Wrong username or password!";
            }
        }
        $this->render('user/login', [
            "error" => $error,
        ]);
    }
}

?>