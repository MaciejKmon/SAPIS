<?php
namespace AppBundle\Security;

use Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator as BaseAuthenticator;

class TokenAuthenticator extends BaseAuthenticator
{
    public function __construct(JWTTokenManagerInterface $jwtManager, EventDispatcherInterface $dispatcher, TokenExtractorInterface $tokenExtractor)
    {
        parent::__construct($jwtManager, $dispatcher, $tokenExtractor);
    }
}
