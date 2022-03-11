<?php

namespace Ineditvision\Dev02Ineditvision\core;

/**
 * Class Response
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  Ineditvision\Dev02Ineditvision\core
 *
 */
class Response {

    public function setStatusCode(int $code) {
        http_response_code($code);

    }

    public function redirect($url) {
        header('Location: ' . $url);
    }

}