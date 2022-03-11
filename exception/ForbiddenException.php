<?php

namespace ineditvision\dev02\core\exception;

/**
 * Class ForbiddenException
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  ineditvision\dev02\core\exception
 *
 */
class ForbiddenException extends \Exception {

    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;



}