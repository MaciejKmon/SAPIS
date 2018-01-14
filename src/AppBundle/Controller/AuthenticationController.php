<?php
namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationController extends Controller
{
    /**
     * @Route("/login")
     * @Method("POST")
     */
    public function loginAction (Request $request)
    {
        $data = $request->getContent();
        $tokenAuth = $this->get('token.authenticator');
        if (!$tokenAuth->checkCredentials($tokenAuth->getCredentials($request), $this->getUser())) {
            return new JsonResponse(['login failed'], Response::HTTP_BAD_REQUEST);
        }

        return new JsonResponse([
        ],
            Response::HTTP_OK);
    }

    /**
     * @Route("/register")
     * @Method("POST")
     */
    public function registerAction(Request $request)
    {
        $form = $this->createForm(UserType::class);
        $form->submit($request->getContent());
        if (!$form->isSubmitted() || !$form->isValid()) {
            return new JsonResponse($form->getErrors(), Response::HTTP_BAD_REQUEST);
        }

        $userData = $form->getData();

        $newUser = new User($userData['username'], $userData['password'], $userData['email']);

        $em = $this->getDoctrine()->getManager();
        $em->persist($newUser);
        $em->flush();

        return new JsonResponse(['User has been created'], Response::HTTP_CREATED);
    }
}
