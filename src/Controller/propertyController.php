<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;

class propertyController extends AbstractController
{
    //A tester,ne fonctionne pas!!
    // /**
    //  * @Route('/biens', name="property.index")
    //  * @return Response
    //  */


    public function index():Response{
        return $this->render('property/index.html.twig',[
            'current_menu' => 'properties'
        ]);
    }

}