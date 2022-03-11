<?php

namespace ineditvision\dev02;

/**
 * Class Response
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  ineditvision\dev02
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