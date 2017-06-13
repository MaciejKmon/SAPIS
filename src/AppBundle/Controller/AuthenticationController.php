<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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

        $user = $tokenAuth->;
    }

    /**
     * @Route("/register")
     * @Method("POST")
     */
    public function registerAction()
    {

    }
}
