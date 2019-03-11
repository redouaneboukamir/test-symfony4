<?php

namespace App\Controller;
use App\Entity\Property;

use Doctrine\Common\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
// Relation avec le contenu des entité et variable de la db
use App\Repository\PropertyRepository;
// use Symfony\Component\Routing\Annotation\Route;

class propertyController extends AbstractController
{
    //A tester,ne fonctionne pas!!
/*    /**
     * @Route('/biens', name="property.index")
     * @return Response
     */

    // On réucpére la classe repository et en fait un constructeur
    public function __construct(PropertyRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    public function index(PaginatorInterface $paginator, Request $request):Response{
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
        /*dump($this->repository);*/

        /*$property = $this->repository->findAllVisible();*/
/*        $property[0]->setSold(true);
        $this->em->flush();*/

//        Creer une entité qui va représenter notre recherche  nb piece etc..

//        Creer un formulaire

//        Gérer le traitement dans le controller

        $properties = $paginator->paginate(
            $this->repository->findAllVisibleQuery(),
            $request->query->getInt('page', 1)/*page number*/,
            12
            );
        return $this->render('property/index.html.twig',[
            'current_menu' => 'properties',
            'properties' => $properties
        ]);
    }

    /*Autre ecriture que ce trouvant dans le cahier*/
    public function show(Property $property, string $slug): Response
    {
        /*$property = $this->repository->find($id);*/
        if($property->getSlug() !== $slug){
            /* Important pour le référencement redirection en cas d'erreur de slug */
            return $this->redirectToRoute('property.show',[
                'id' => $property->getId(),
                'slug' => $property->getSlug()
            ], 301);
        }
        return $this->render('property/show.html.twig',[
            'property' => $property,
            'current_menu' => 'properties'
        ]);
    }

}
