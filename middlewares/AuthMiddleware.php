<?php

namespace Ineditvision\Dev02Ineditvision\core\middlewares;
use Ineditvision\Dev02Ineditvision\core\Application;
use Ineditvision\Dev02Ineditvision\core\exception\ForbiddenException;

/**
 * Class AuthMiddleware
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  Ineditvision\Dev02Ineditvision\core\middlewares
 *
 */
class AuthMiddleware extends BaseMiddleware {

    public array $actions = [];

    /**
     * AuthMiddleware constructor.
     * 
     * @param array $actions
     */
    public function __construct(array $actions = []) {
        $this->actions = $actions;
    }


    public function execute() {
        if (Application::isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions) ) {
                throw new ForbiddenException();
            }
        }
    }


}