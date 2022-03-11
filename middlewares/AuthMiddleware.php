<?php

namespace ineditvision\dev02\core\middlewares;
use ineditvision\dev02\core\Application;
use ineditvision\dev02\core\exception\ForbiddenException;

/**
 * Class AuthMiddleware
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  ineditvision\dev02\core\middlewares
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