<?php


namespace App\Controller;
use PDO;
use Cacofony\BaseClasse\BaseController;
use Cacofony\Helper\AuthHelper;
use App\Manager\UserManager;
use Firebase\JWT\JWT;
use Cacofony\Factory\PDOFactory;

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
        $connect = false;

        foreach ($users as $user)
        {
            if($user->username == $_POST['username'] && $user->pwd == hash('sha256', $_POST['password']))
            {
                $connect = true;
            }
        }

        if($connect)
        {
            $jwt = JWT::encode(['user' => $this->HTTPRequest->getRequest('username')], $_ENV['APP_SECRET']);
            $_SESSION['user_badge'] = $jwt;
            $this->HTTPResponse->redirect('/');
        } else { 
            $this->HTTPResponse->redirect('/');
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

    /**
     * @Route(path="/create")
     * @return void
     */
    public function getCreate()
    {
        $this->render('Security/create', [], '');
    }

    /**
     * @Route(path="/create")
     * @param UserManager $userManager
     * @return void
     */
    public function postCreate(UserManager $userManager)
    {
        if(isset($_POST['username']) && isset($_POST['password'])  ){
            
            $name = $_POST['username'];
            $pwd = hash('sha256', $_POST['password']);

            $createUser = $userManager->createUser($name, $pwd);

            if($createUser)
            {
                $this->HTTPResponse->redirect('/');
            }
        }
    }
}