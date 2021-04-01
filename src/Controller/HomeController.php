<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Langages;
use App\Entity\Modules;
use App\Repository\UserRepository;
use App\Repository\ModulesRepository;
use App\Repository\LangagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Security\UserAuthenticator;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;



class HomeController extends AbstractController
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


    /**
     * @Route("/inscription",name="inscription")
     */
    public function inscription(){

        return $this->render('home/inscription.html.twig');
    }

    /**
     * @Route("/save-user", name="save_user")
     */
    public function save_user(Request $request,UserAuthenticator $authenticator, GuardAuthenticatorHandler $guardHandler){
        // recuperons les parametres

        $nom = $request->get('nom');
        $prenom = $request->get('prenom');
        $username = $request->get('username');
        $pass = $request->get('pass');
        $email = $request->get('email');

// enregistrons le compte
        $user = new User();
        $user->setNom($nom);
        $user->setPrenom($prenom);
        $user->setEmail($email);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            $pass
        ));
        $user->setAge(0);
        $user->setDateNaissance(' ');
        $user->setSexe(' ');
        $user->setDateInscription(new \DateTime());
        $user->setRoles(["ROLE_USER"]);
        $user->setUserName($username);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

     $guardHandler->authenticateUserAndHandleSuccess(
        $user,
        $request,
        $authenticator,
        'main'
      ); 

        $repository3 = $this -> getDoctrine() -> getRepository(Langages::class);
        $langages = $repository3 -> findAll();

        // if ($request->isXmlHttpRequest() || $request->query->get('showJson')==1) {
              $jsonData = array();
                     $idx=0;

             foreach($langages as $com){
                 $temp = array(
                        'id' => $com -> getId(),
                         'nom' => $com->getNom(),
                        'description' => $com -> getDescription(),
                     );
              $jsonData[$idx++] = $temp;
         }
    
        return new JsonResponse($jsonData);
        // }else{

        // }
}

/**
 * Route("/choix-module", mame="choix_module")
 */
public function choix_module(Request $request){

    return new Response('hello');
}

// creons la route d'initialisation de l'admin
/**
 * @Route("/init", name="init")
 */
public function initer(Request $request,UserAuthenticator $authenticator, GuardAuthenticatorHandler $guardHandler){
    $repository3 = $this -> getDoctrine() -> getRepository(User::class);
    $admin = $repository3 -> findAll();
    $isAdmin = false;
    foreach($admin as $adm){
        if($adm->getRoles()[0] == 'ROLE_ADMIN'){
            $isAdmin = true;
        }
    }

   if($isAdmin == true){
    return $this->redirectToRoute('home');
   }else{
    $user = new User();
        $user->setNom('Tiffa');
        $user->setPrenom('Loic Vadess');
        $user->setEmail('Tiffa.loic02@gmail.com');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'Loic237'
        ));
        $user->setAge(0);
        $user->setDateNaissance(' ');
        $user->setSexe(' ');
        $user->setDateInscription(new \DateTime());
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setUserName('tatsumi oga');

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

     $guardHandler->authenticateUserAndHandleSuccess(
        $user,
        $request,
        $authenticator,
        'main'
      ); 

      return $this->redirectToRoute('admin');
    }

}

    /**
     * @Route("/progression", name="progression")
     */
    public function progression(Request $request){

        return new Response('votre langage est <b>'.$request->get('langage'));
    }



}
