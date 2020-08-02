<?php
namespace App\Controller;

use App\Entity\ApiToken;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class AuthenticationController extends Controller
{
    /**
     * @Route("/login", methods={"POST"})
     */
    public function loginAction (Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        if (empty($request->get('username')) || empty($request->get('password'))) {

            return new JsonResponse(['message' => 'In order to login, please provide username and password'], Response::HTTP_BAD_REQUEST);
        }

        $user = $this->getDoctrine()->getManager()->getRepository(User::class)->findOneBy(['username' => $request->get('username')]);

        if(empty($user)) {

            return new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }

        if (!$passwordEncoder->isPasswordValid($user, $request->get('password'))) {

            return new JsonResponse(['message' => 'User not found'], Response::HTTP_UNAUTHORIZED);
        }

        $newToken = $this->refreshToken($user);

        return new JsonResponse(['token' => $newToken->getToken()], Response::HTTP_OK);
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

        $userData = $form->getData();

        $newUser = new User($userData['username'], $userData['password'], $userData['email']);

        $em = $this->getDoctrine()->getManager();
        $em->persist($newUser);
        $em->flush();

        return new JsonResponse(['User has been created'], Response::HTTP_CREATED);
    }

    private function refreshToken ($user)
    {
        $em = $this->getDoctrine()->getManager();
        $this->getDoctrine()->getManager()->getRepository(ApiToken::class)->removeExpiredTokens();
        $newToken = new ApiToken($user);
        $em->persist($newToken);
        $em->flush();

        return $newToken;
    }
}
