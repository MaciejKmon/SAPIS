<?php
namespace App\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

class AuthenticationController extends Controller
{
    /**
     * @Route("/login", methods={"POST"})
     */
    public function loginAction (Request $request)
    {

//        if () {
//            return new JsonResponse(['login failed'], Response::HTTP_BAD_REQUEST);
//        }

        return new JsonResponse([
        ],
            Response::HTTP_OK);
    }

    /**
     * @Route("/register", methods={"POST"})
     */
    public function registerAction(Request $request)
    {
        $form = $this->createForm(UserType::class);
        $userData = json_decode($request->getContent(), true);
        $form->submit($userData);
        if (!$form->isSubmitted() || !$form->isValid()) {
            return new JsonResponse($form->getErrors(), Response::HTTP_BAD_REQUEST);
        }

//        $userData = $form->getData();

        $newUser = new User($userData['username'], $userData['password'], $userData['email']);

        $em = $this->getDoctrine()->getManager();
        $em->persist($newUser);
        $em->flush();

        return new JsonResponse(['User has been created'], Response::HTTP_CREATED);
    }
}
