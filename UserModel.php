<?php

namespace ineditvision\dev02\core;
use ineditvision\dev02\core\db\DbModel;

/**
 * Class UserModel
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  ineditvision\dev02\core
 *
 */
abstract class UserModel extends DbModel {

    abstract public function getDisplayName(): string;


}