<?php


namespace App\Controller;
use PDO;
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
        $connect = false;

        foreach ($users as $user)
        {
            if($user->username == $_POST['username'] && $user->pwd == $_POST['password'])
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
            echo("usename or password incorrect");
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
     * @Route(path="/login")
     * @param UserManager $userManager
     * @return void
     */
    public function postCreate(UserManager $userManager)
    {
        if(isset($_POST['username']) && isset($_POST['password'])  ){
            $servername = "localhost";
            $username = "username";
            $password = "password";
            $dbname = "mt4-data";
            $name = $_POST['username'];
            $pwd = $_POST['password'];

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO User (username, pwd)
                VALUES ($name, $pwd)";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "New record created successfully";
                } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }

            $conn = null;
        }
    }
}