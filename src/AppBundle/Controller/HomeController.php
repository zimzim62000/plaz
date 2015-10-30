<?php

namespace AppBundle\Controller;

use ZIMZIM\ToolsBundle\Controller\MainController;

/**
 * Category controller.
 *
 */
class HomeController extends MainController
{
    public function indexAction(){
        return $this->render(
            'AppBundle:Home:index.html.twig'
        );
    }
}