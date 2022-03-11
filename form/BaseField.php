<?php

namespace ineditvision\dev02\form;

/**
 * Class BaseField
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  ineditvision\dev02\form
 *
 */
abstract class BaseField {

    public $model;                          //public Model $model;                  //PHP >=7.4 - type property
    public $attribute;                      //public string $attribute

    public function __construct($model, $attribute) {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString() {
        return sprintf('
        <div class="form-group mb-3">
            <label>%s</label>
            %s
            <div class="invalid-feedback">
                %s
            </div>
        </div>
        ',
            $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }

    abstract public function renderInput(): string;         //'textarea', 'input' etc

}