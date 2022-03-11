<?php

namespace Ineditvision\Dev02Ineditvision\core\exception;

/**
 * Class NotFoundException
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  Ineditvision\Dev02Ineditvision\core\exception
 *
 */
class NotFoundException extends \Exception {

    protected $message = 'Page not found';
    protected $code = 404;

}