<?
declare(strict_types=1);
namespace Tests\FunctionalTest\ControllerTest;

use App\Controller\AuthenticationController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthenticationControllerTest extends WebTestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testLogin()
    {
        $testUsername = env('FIXTURES_USER_USERNAME');
        $testPassword = env('FIXTURES_USER_PASSWORD');
    }
}
