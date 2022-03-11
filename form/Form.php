<?php

namespace Ineditvision\Dev02Ineditvision\core\form;
//use Ineditvision\Dev02Ineditvision\core\Model;

/**
 * Class Form - core-form
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  Ineditvision\Dev02Ineditvision\core\form
 *
 */
class Form {
    
    public static function begin($action, $method) {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end() {
        echo '</form>';
    }

    public function field($model, $attribute) {
        return new InputField($model, $attribute);
    }

}