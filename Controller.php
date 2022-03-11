<?php

namespace Ineditvision\Dev02Ineditvision\core;
use Ineditvision\Dev02Ineditvision\core\middlewares\BaseMiddleware;

/**
 * Class Controller
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  Ineditvision\Dev02Ineditvision\core
 * 
 * - base controller class, used for purpose of extension
 *
 */
class Controller {

    public $layout = 'main';                //public string $layout = 'main';       //PHP >=7.4 - type property
    public $action = '';                    //public string $action = '';

    /**
     * @var \Ineditvision\Dev02Ineditvision\core\middlewares\BaseMiddleware[]
     */
    protected array $middlewares = [];

    public function setLayout($layout) {
        $this->layout = $layout;
    }

    public function render($view, $params = []) {
        return Application::$app->router->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware) {
        $this->middlewares[] = $middleware;

    }

    public function getMiddlewares(): array {
        return $this->middlewares;
    }

}