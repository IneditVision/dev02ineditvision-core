<?php

namespace ineditvision\dev02\exception;

/**
 * Class NotFoundException
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  ineditvision\dev02\exception
 *
 */
class NotFoundException extends \Exception {

    protected $message = 'Page not found';
    protected $code = 404;

}