<?php

namespace ineditvision\dev02\middlewares;
use ineditvision\dev02\Application;
use ineditvision\dev02\exception\ForbiddenException;

/**
 * Class AuthMiddleware
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  ineditvision\dev02\middlewares
 *
 */
class AuthMiddleware extends BaseMiddleware {

    protected array $actions = [];

    /**
     * AuthMiddleware constructor.
     * 
     * @param array $actions
     */
    public function __construct($actions = []) {
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