<?php

namespace Ineditvision\Dev02Ineditvision\core;
use Ineditvision\Dev02Ineditvision\core\db\DbModel;

/**
 * Class UserModel
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  Ineditvision\Dev02Ineditvision\core
 *
 */
abstract class UserModel extends DbModel {

    abstract public function getDisplayName(): string;


}