<?php

namespace App\Controller;

use App\Entity\Langages;
use App\Entity\Progression;
use App\Entity\Parties;
use App\Entity\ContenueExo;
use App\Repository\PartiesRepository;
use App\Repository\ContenueExoRepository;
use App\Repository\ProgressionExoRepository;
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
     * controlleur pour charger la premiere epreuve
     * @Route("/lets-go/{id}-tech",name="playing")
     */
    public function playing($id){
        $repository3 = $this -> getDoctrine() -> getRepository(Langages::class);
        $parties = $repository3 -> findOneBy(['id'=>$id]);

        $repository3 = $this -> getDoctrine() -> getRepository(Parties::class);
        $parts = $repository3 -> findBy(['langage_id'=>$id]);
        $duree = 0;
        $part_id = 0;

        foreach($parts as $part){
            $duree = $part->getDuree();
            $part_id = $part->getId();
        }

        
        return $this->render('partie/playing.html.twig',[
            'langage'=>$parties->getNom(),
            'lang_id'=>$id,
            'duree' => $duree,
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
                        'rep2' => $com -> getRep2(),
                        'exo3' => $com -> getExo3(),
                        'rep3' => $com -> getRep3(),
                        'exo4' => $com -> getExo4(),
                        'rep4' => $com -> getRep4(),
                        'exo5' => $com -> getExo5(),
                        'rep5' => $com -> getRep5(),
                        'exo6' => $com -> getExo6(),
                        'rep6' => $com -> getRep6(),
                        'exo7' => $com -> getExo7(),
                        'rep7' => $com -> getRep7(),
                        'exo8' => $com -> getExo8(),
                        'rep8' => $com -> getRep8(),
                        'exo9' => $com -> getExo9(),
                        'rep9' => $com -> getRep9(),
                        'exo10' => $com -> getExo10(),
                        'rep10' => $com -> getRep10(),
                        

                     );
              $jsonData[$idx++] = $temp;
         }
    
        return new JsonResponse($jsonData);
}

/**
 * controlleur d'enregistrement de la progression
 * @Route("/progress-saver",name="progress_saver")
 */
public function progress_saver(Request $request){
    $lang_id = $request->get('lang_id');
    $part_id = $request->get('partie_id');
    $niv_id = $request->get('niv_id');

    $repository3 = $this -> getDoctrine() -> getRepository(Progression::class);
    $progression = $repository3 -> findBy(['user_id'=>$this->getUser()->getId(),'partie_id'=>$part_id]);

    $estLa = false; // variable pour savoir si lutilisateur est deja enregistrer ou pas 

    foreach($progression as $progress){
        if($this->getUser()->getId() == $progress->getUserId()){
            $estLa = true;
        }
    }

    // si il n'est pas encore enregistrer
    if($estLa == false){
        // on l'enregistre
        $progression = new Progression();
        $progression->setLangageId($lang_id);
        $progression->setPartieId($part_id);
        $progression->setNiveauId($niv_id);
        $progression->setUserId($this->getUser()->getId());

        $em = $this->getDoctrine()->getManager();
        $em->persist($progression);
        $em->flush();

        

    }

    if($estLa == true){

        foreach($progression as $prog){

        
        $em = $this->getDoctrine()->getManager();
        $prog->setLangageId($lang_id);
        $prog->setPartieId($part_id);
        $prog->setNiveauId($niv_id);
        $prog->setUserId($this->getUser()->getId());

        $em->flush();

        }
        
    }

    // on redirige vers le controlleur qui se charge de charger les parties
    return $this->redirectToRoute('loader_play',['lang_id'=>$lang_id,'part_id'=>$part_id]);

}

/**
 * cette methode permet de charger les partie en fonction du lieu ou le joueur s'est arreter
 *@Route("/loader-play/{lang_id}/{part_id}", name="loader_play")
 */
 public function loader_play($lang_id,$part_id){
   
    return new Response('Chargement de la 2eme epreuve...');
 }

/**
* methode pour charger la seconde partie
* @Route("/lets-go/{id}-tech",name="playing")
*/
    public function playing2($id){
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





}
