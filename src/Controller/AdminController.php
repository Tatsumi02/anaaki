<?php

namespace App\Controller;

use App\Entity\Langages;
use App\Entity\Modules;
use App\Entity\Parties;
use App\Entity\ContenueCours;
use App\Entity\ContenueExo;
use App\Repository\LangagesRepository;
use App\Repository\ContenueCoursRepository;
use App\Repository\ContenueExoRepository;
use App\Repository\ModulesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;


/**
*@IsGranted("ROLE_ADMIN")
* @Route("/admin")
*/
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/build-langage", name="build_langage")
     */
    public function build_langage(Request $request){

            $isSend = false;
            $isSend = $request->get('send');

        return $this->render('admin/lange_form.html.twig',[
            'isSend'=>$isSend,
        ]);
    }

    /**
     * @Route("/save-langage",name="save_langage")
     */
    public function save_langage(Request $request){
        $langage = $request->request->get('nom');
        $description = $request->request->get('description');

        $lang = new Langages();
        $lang->setNom($langage);
        $lang->setDescription($description);

        $em = $this->getDoctrine()->getManager();
        $em->persist($lang);
        $em->flush();

        return $this->redirectToRoute('build_langage',['send'=>true]);
    }


    /**
     *@Route("/creer-module",name="creer_module")
     */
    public function creer_module(Request $request){
        $isSend = false;
        $isSend=$request->get('send');

        $repository = $this -> getDoctrine() -> getRepository(Langages::class);
        $langages = $repository -> findAll();
    

        return $this->render('admin/module_form.html.twig',[
            'isSend' => $isSend,
            'langages' => $langages,
        ]);
    }

    /**
     * @Route("/save-module", name="save_module")
     */
    public function save_module(Request $request){
        $langage = $request->request->get('nom');
        $description = $request->request->get('description');
        $langage_id = $request->request->get('langageId');

        // $lang = $mod => module
        $lang = new Modules();
        $lang->setNom($langage);
        $lang->setDescription($description);
        $lang->setLangageId($langage_id);
        $lang->setUserId($this->getUser()->getId());


        $em = $this->getDoctrine()->getManager();
        $em->persist($lang);
        $em->flush();

        return $this->redirectToRoute('creer_module',['send'=>true]);
    }

    /**
     * @Route("/creer-cours", name="creer_cours")
     */
    public function creer_cours(Request $request){
        $isSend = false;
        $isSend = $request->get('send');

        $repository = $this -> getDoctrine() -> getRepository(Modules::class);
        $modules = $repository -> findAll();

    
        foreach($modules as $mod){
            
            $repository = $this -> getDoctrine() -> getRepository(Langages::class);
            $langages = $repository -> findAll();
        }
    

        return $this->render('admin/course_form.html.twig',[
            'modules' => $modules,
            'isSend' => $isSend,
            'langages' => $langages,
        ]);
    }

    /**
     * @Route("/save-cours", name="save_cours")
     */
    public function save_cours(Request $request){
        $langage_id = $request->request->get('langageId');
        $titre = $request->request->get('titre');
        $intro = $request->request->get('intro');
        $dev = $request->request->get('dev');
        $conclu = $request->request->get('conclu');
        $ref = $request->request->get('ref');

        $cours = new ContenueCours();
        $cours->setModuleId($langage_id);
        $cours->setIntroduction($intro);
        $cours->setDev($dev);
        $cours->setConclusion($conclu);
        $cours->setRef($ref);
        $cours->setTitre($titre);

        $em = $this->getDoctrine()->getManager();
        $em->persist($cours);
        $em->flush();

        return $this->redirectToRoute('creer_cours',['send'=>true]);

    }

    /**
     * @Route("/creer-exo",name="creer_exo")
     */
    public function creer_exo(Request $request){
        $isSend = false;
        $isSend = $request->get('send');

        $repository = $this -> getDoctrine() -> getRepository(Langages::class);
        $langages = $repository -> findAll();

        return $this->render('admin/exo_form.html.twig',[
            'langages'=>$langages,
            'isSend'=>$isSend,
        ]);

    }

    /**
     * @Route("/save-exo",name="save_exo")
     */
    public function save_exo(Request $request){
        $langage_id = $request->request->get('langageId');
        $titre = $request->request->get('titre');


        $q1 = $request->request->get('q1');
        $r1 = $request->request->get('r1');

        $q2 = $request->request->get('q2');
        $r2 = $request->request->get('r2');

        $q3 = $request->request->get('q3');
        $r3 = $request->request->get('r3');

        $q4 = $request->request->get('q4');
        $r4 = $request->request->get('r4');

        $q5 = $request->request->get('q5');
        $r5 = $request->request->get('r5');

        $q6 = $request->request->get('q6');
        $r6 = $request->request->get('r6');

        $q7 = $request->request->get('q7');
        $r7 = $request->request->get('r7');

        $q8 = $request->request->get('q8');
        $r8 = $request->request->get('r8');

        $q9 = $request->request->get('q9');
        $r9 = $request->request->get('r9');

        $q10 = $request->request->get('q10');
        $r10 = $request->request->get('r10');

        $exo = new ContenueExo();
        $exo->setModuleId($langage_id);
        $exo->setTitre($titre);

        $exo->setExo1($q1);
        $exo->setRep1($r1);

        $exo->setExo2($q2);
        $exo->setRep2($r2);

        $exo->setExo3($q3);
        $exo->setRep3($r3);

        $exo->setExo4($q4);
        $exo->setRep4($r4);

        $exo->setExo5($q5);
        $exo->setRep5($r5);

        $exo->setExo6($q6);
        $exo->setRep6($r6);

        $exo->setExo7($q7);
        $exo->setRep7($r7);

        $exo->setExo8($q8);
        $exo->setRep8($r8);

        $exo->setExo9($q9);
        $exo->setRep9($r9);

        $exo->setExo10($q10);
        $exo->setRep10($r10);



        $em = $this->getDoctrine()->getManager();
        $em->persist($exo);
        $em->flush();

        return $this->redirectToRoute('creer_exo',['send'=>true]);

    }

    /**
     * @Route("/creer-une-partie-de-jeux",name="creer_partie")
     */
    public function creer_partie(Request $request){
        $isSend = false;
        $isSend = $request->get('send');

        $repository = $this -> getDoctrine() -> getRepository(ContenueExo::class);
        $exos = $repository -> findAll();

        $repository = $this -> getDoctrine() -> getRepository(Langages::class);
        $langages = $repository -> findAll();


        return $this->render('admin/partie_form.html.twig',[
            'exos'=>$exos,
            'isSend'=>$isSend,
            'langages' => $langages,
        ]);

    }

    /**
     * @Route("/save_partie",name="save_partie")
     */
    public function save_partie(Request $request){
        $langage_id = $request->request->get('langageId');
        $nom = $request->request->get('titre');
        $description = $request->request->get('description');
        $exo_id1 = $request->request->get('exoId1');
        $exo_id2 = $request->request->get('exoId2');
        $exo_id3 = $request->request->get('exoId3');
        $exo_id4 = $request->request->get('exoId4');
        $exo_id5 = $request->request->get('exoId5');
        $duree = $request->request->get('duree');

        $partie = new Parties();

        $partie -> setNom($nom);
        $partie -> setLangageId($langage_id);
        $partie -> setDescrition($description);
        $partie -> setExo1Id($exo_id1);
        $partie -> setExo2Id($exo_id2);
        $partie -> setExo3Id($exo_id3);
        $partie -> setExo4Id($exo_id4);
        $partie -> setExo5Id($exo_id5);

        $partie->setDuree($duree);
        $partie->setUserId($this->getUser()->getId());

        $em = $this->getDoctrine()->getManager();
        $em->persist($partie);
        $em->flush();

        return $this->redirectToRoute('creer_partie',['send'=>true]);
        

    }



}
