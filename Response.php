<?php

namespace ineditvision\dev02\core;

/**
 * Class Response
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  ineditvision\dev02\core
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