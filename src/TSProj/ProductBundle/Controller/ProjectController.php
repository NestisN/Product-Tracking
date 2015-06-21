<?php

namespace TSProj\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ProjectController extends Controller
{
    /**
     * @Route("/main",name="main_ts_homepage")
     * @Template()
    
     */
    public function mainAction()
    {
        return $this->render('TSProjProductBundle:twig:main.html.twig');    
    }

    

}
