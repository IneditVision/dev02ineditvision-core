<?php

namespace ineditvision\dev02;
use ineditvision\dev02\db\DbModel;

/**
 * Class UserModel
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  ineditvision\dev02
 *
 */
abstract class UserModel extends DbModel {

    abstract public function getDisplayName(): string;

}