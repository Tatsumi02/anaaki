<?php

namespace App\Controller;

use App\Entity\Langages;
use App\Entity\Parties;
use App\Entity\ContenueExo;
use App\Repository\PartiesRepository;
use App\Repository\ContenueExoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;

/**
*@IsGranted("ROLE_USER")
* @Route("/partie")
*/
class PartieController extends AbstractController
{
    /**
     * @Route("/", name="partie")
     */
    public function index(): Response
    {
        return $this->render('partie/index.html.twig', [
            'controller_name' => 'PartieController',
        ]);
    }

     /**
     * @Route("/gaming/{L_id}-{lang}",name="gaming")
     */
    public function gaming($lang,$L_id){

        return $this->render('partie/progression.html.twig',[
            'langage' => $lang,
            'langage_id' => $L_id,
        ]);

    }

// controller pour charger les parties

     /**
     * @Route("/partie-liste", name="parties_liste")
     */
    public function save_user(Request $request){
    
        $repository3 = $this -> getDoctrine() -> getRepository(Parties::class);
        $parties = $repository3 -> findBy(['langage_id'=>$request->get('langage_id')]);

              $jsonData = array();
                     $idx=0;

             foreach($parties as $com){
                 $temp = array(
                        'id' => $com -> getId(),
                         'nom' => $com->getNom(),
                        'description' => $com -> getDescrition(),
                     );
              $jsonData[$idx++] = $temp;
         }
    
        return new JsonResponse($jsonData);
}

    /**
     * @Route("/playing" , name="load_playing")
     */
    public function Load_playing(Request $request){
        $langage_id = $request->get('id_lang');

        return $this->redirectToRoute('playing',['id'=>$langage_id]);
    }

    /**
     * @Route("/lets-go/{id}-tech",name="playing")
     */
    public function playing($id){
        $repository3 = $this -> getDoctrine() -> getRepository(Langages::class);
        $parties = $repository3 -> findOneBy(['id'=>$id]);

        $repository3 = $this -> getDoctrine() -> getRepository(Parties::class);
        $part = $repository3 -> findOneBy(['langage_id'=>$id]);


        return $this->render('partie/playing.html.twig',[
            'langage'=>$parties->getNom(),
            'lang_id'=>$id,
            'duree' => $part->getDuree(),
        ]);
    }

     /**
     * @Route("/partie-choisir", name="parties_choisir")
     */
    public function load_partie(Request $request){
    
        $repository3 = $this -> getDoctrine() -> getRepository(Parties::class);
        $parties = $repository3 -> findBy(['langage_id'=>$request->get('langage_id')]);

              $jsonData = array();
                     $idx=0;

             foreach($parties as $com){
                 $temp = array(
                        'id' => $com -> getId(),
                         'nom' => $com->getNom(),
                        'description' => $com -> getDescrition(),
                        'niv1' => $com -> getExo1Id(),
                        'niv2' => $com -> getExo2Id(),
                        'niv3' => $com -> getExo3Id(),
                        'niv4' => $com -> getExo4Id(),
                        'duree' => $com -> getDuree(),
                        'langage_id' => $com -> getLangageId()
                     );
              $jsonData[$idx++] = $temp;
         }
    
        return new JsonResponse($jsonData);
}

 /**
  * controller pour charger le premier exo
     * @Route("/load_partie1", name="load_partie1")
     */
    public function load_exo(Request $request){
    
        $repository3 = $this -> getDoctrine() -> getRepository(ContenueExo::class);
        $parties = $repository3 -> findBy(['id'=>$request->get('exo_id')]);

              $jsonData = array();
                     $idx=0;

             foreach($parties as $com){
                 $temp = array(
                        'id' => $com -> getId(),
                         'exo1' => $com->getExo1(),
                        'rep1' => $com -> getRep1(),
                        'exo2' => $com -> getExo2(),
                        
                     );
              $jsonData[$idx++] = $temp;
         }
    
        return new JsonResponse($jsonData);
}





}
