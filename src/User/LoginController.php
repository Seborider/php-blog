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
        $this->render('user/login', []);
    }
}

?>