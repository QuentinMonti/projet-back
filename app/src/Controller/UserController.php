<?php

namespace App\Controller;

use Cacofony\BaseClasse\BaseController;
use App\Manager\UserManager;
use App\Service\ExampleService;

class UserController extends BaseController
{
    /**
     * @Route(path="/user", name="userPage")
     * @param UserManager $userManager
     * @param ExampleService $service
     * @return void
     */
    public function getUser(UserManager $userManager, ExampleService $service)
    {
        $users = $userManager->findAll();
        $this->render('Frontend/user', [
            'users' => $users,
            'strongText' => $service->getStrong('je suis du texte qui vient d\'un service en autowiring'),
            'appSecret' => $service->getAppSecret()
        ], 'Le titre de la page');
    }
}