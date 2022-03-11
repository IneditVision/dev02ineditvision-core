<?php

namespace Ineditvision\Dev02Ineditvision\core;
use Ineditvision\Dev02Ineditvision\core\db\Database;

/**
 * Class Application
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  Ineditvision\Dev02Ineditvision\core
 * 
 * WARNING: type property - requires PHP >= 7.4x
 *
 */
class Application {
    public static $ROOT_DIR;                //public static string $ROOT_DIR;       //PHP >=7.4 - type property

    public string $layout = 'main';
    public $userClass;                      //public string $userClass;
    public $router;                         //public Router $router;                //PHP >=7.4 - type property
    public $request;                        //public Request $request;              //PHP >=7.4 - type property
    public $response;                       //public Response $response;            //PHP >=7.4 - type property
    public $session;                        //public Session $session;
    public $db;                             //public Database $db;
    // cu ? in fata pt ca poate fi null [pt guesti]
    //public ?UserModel $user;
    public $user;                           //public DbModel ?$user;
    public $view;                           //public View $view;

    public static $app;                     //public static Application $app;       //PHP >=7.4 - type property
    public $controller = null;              //public ?Controller $controller;        //PHP >=7.4 - type property

    public function __construct($rootPath, $config) {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();

        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);  //findOne e al lui User:: si in core ar trebui folosite doar chestii de baza, deci a fost instantiat prin index ca userClass aceasta clasa User si se pot folosi metodele ei
        } else {
            $this->user = null;
        }
    }

    public static function isGuest() {
        return !self::$app->user;
    }

    public function run() {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->router->renderView('_error', [
                'exception' => $e
            ]);
        }
        
    }

    /**
     * @return \IneditVision\Dev02Ineditvision\core\Controller
     */
    public function getController(): \IneditVision\Dev02Ineditvision\core\Controller
    {
        return $this->controller;
    }

    /**
     * @param \IneditVision\Dev02Ineditvision\core\Controller $controller
     */
    public function setController($controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @param UserModel $user
     */
    public function login($user) {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }


    public function logout() {
        $this->user = null;
        $this->session->remove('user');
    }


}