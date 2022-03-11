<?php

namespace Ineditvision\Dev02Ineditvision\core\exception;

/**
 * Class ForbiddenException
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  Ineditvision\Dev02Ineditvision\core\exception
 *
 */
class ForbiddenException extends \Exception {

    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;



}