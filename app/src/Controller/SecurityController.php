<?php

namespace App\Controller;

use Cacofony\BaseClasse\BaseController;
use Cacofony\Helper\AuthHelper;
use App\Manager\UserManager;
use Firebase\JWT\JWT;

class SecurityController extends BaseController
{
    /**
     * @Route(path="/login")
     * @return void
     */
    public function getLogin()
    {
        $this->render('Security/login', [], 'Please login');
    }

    /**
     * @Route(path="/login")
     * @param UserManager $userManager
     * @return void
     */
    public function postLogin(UserManager $userManager)
    {
        $users = $userManager->findAll();

        foreach ($users as $user)
        {
            if($user->username == $_POST['username'] && $user->pwd == $_POST['password'])
            {
                $jwt = JWT::encode(['user' => $this->HTTPRequest->getRequest('username')], $_ENV['APP_SECRET']);
                $_SESSION['user_badge'] = $jwt;
                $this->HTTPResponse->redirect('/');
            }
        }

    }

    /**
     * @Route(path="/logout")
     * @return void
     */
    public function getLogout()
    {
        AuthHelper::logout();
        $this->HTTPResponse->redirect('/');
    }
}