<?php

namespace ineditvision\dev02;

/**
 * Class View
 * 
 * @author   IneditVision <florin@ineditvision.ro>
 * @package  ineditvision\dev02
 * 
 * - for title purposes
 * - moved all methods here
 *
 */
class View {

    public $title = '';                     //public string $title = '';

    public function renderView($view, $params = []) {
        $viewContent = $this->renderOnlyView($view, $params);
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent) {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent() {
        $layout = Application::$app->layout;
        if (Application::$app->controller) {
            $layout = Application::$app->controller->layout;    
        }
        
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params) {
        // attaching variables to params
        foreach ($params as $key => $value) {
            $$key = $value ;       // note $$ for name variable !
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }

}