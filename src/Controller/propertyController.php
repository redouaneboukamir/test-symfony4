<?php

namespace App\Controller;
use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
// Relation avec le contenu des entité et variable de la db
use App\Repository\PropertyRepository;
// use Symfony\Component\Routing\Annotation\Route;

class propertyController extends AbstractController
{
    //A tester,ne fonctionne pas!!
    // /**
    //  * @Route('/biens', name="property.index")
    //  * @return Response
    //  */

    // On réucpére la classe repository et en fait un constructeur
    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index():Response{
        // Create de property et appel des setter dans la variable
        // $property = new Property();
        // $property->setTitle('Mon premier titre')
        //     ->setPrice(2000)
        //     ->setRooms(4)
        //     ->setBedrooms(3)
        //     ->setDescription('Une petite description')
        //     ->setSurface(60)
        //     ->setFloor(4)
        //     ->setHeat(1)
        //     ->setCity('charleroi')
        //     ->setAddress('rue test')
        //     ->setPostalCode('6000');
        // // Créer une entité manager pour envoyer a la DB
        // $em = $this->getDoctrine()->getManager();
        // // Persiste mon entité
        // $em->persist($property);
        // // Envois vers la DB
        // $em->flush();

        // Injection du repository Property
        // $repository = $this->getDoctrine()->getRepository(Property::class);
        // dump($repository);
        $property = $this->repository->find(id);
        dump($property);
        return $this->render('property/index.html.twig',[
            'current_menu' => 'properties'
        ]);
    }

}