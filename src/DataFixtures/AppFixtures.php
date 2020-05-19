<?php
namespace App\DataFixtures;

use App\Entity\ApiToken;
use App\Entity\Profile;
use App\Entity\Story;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    //sample text generated using https://www.lipsum.com/
    const TEXT = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sollicitudin vel dui nec fringilla. Aliquam erat volutpat. 
    Integer luctus orci lacus, sed consequat turpis semper porttitor. Quisque dapibus sem a elit suscipit pulvinar. Maecenas vel interdum enim. 
    Cras quis elementum nunc, id suscipit velit. Morbi pretium tortor est, at dictum ante varius a. 
    Donec eleifend, leo et suscipit tincidunt, nunc lorem venenatis libero, eu pretium mauris enim id nisl. Sed faucibus sagittis lorem, pellentesque mattis odio. 
    Donec suscipit tempor bibendum. Praesent at faucibus lacus. Aliquam metus enim, maximus non cursus vel, ornare id nibh.';

    const TEXT_LENGTH_LONG = 100;
    const TEXT_LENGTH_SHORT = 50;
    const RANDOM_NUMBER_MAX = 20;
    const RANDOM_NUMBER_MIN = 0;


    /**
     * @var User|null $user
     */
    private $user;
    private $passwordEncoder;
    private $randomNumber;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->randomNumber = rand(self::RANDOM_NUMBER_MIN, self::RANDOM_NUMBER_MAX);
    }

    public function load(ObjectManager $manager)
    {
        $this->generateUsers($manager);
        $manager->flush();
    }

    private function generateUsers(ObjectManager $manager)
    {
            $user = new User(
                getenv('FIXTURES_USER_USERNAME'),
                '',
                getenv('FIXTURES_USER_EMAIL')
            );
            $user->setPassword($this->passwordEncoder->encodePassword($user, getenv('FIXTURES_USER_PASSWORD')));
            $this->user = $user;
            $user->setProfile($this->createUserProfile($this->randomNumber));
            $user->setRoles(['ROLE_USER']);
            $user->setStories($this->generateStories($this->randomNumber, $user));
            $manager->persist($user);

            $apiToken = new ApiToken($user);
            $manager->persist($apiToken);
    }

    private function generateStories($howMany, User $user)
    {
        $stories = [];

        for ($counter = 0; $counter < $howMany; $counter++) {
            $title = substr(self::TEXT, rand(self::TEXT_LENGTH_SHORT, self::TEXT_LENGTH_LONG), rand(++$counter, self::TEXT_LENGTH_LONG));
            $body = substr(self::TEXT, rand($counter, self::TEXT_LENGTH_LONG + $counter), $counter * $this->randomNumber);
            $story = new Story($user, $body, $title);
            $stories[] = $story;
        }

        return $stories;
    }

    private function createUserProfile($number)
    {
        $profile = new Profile($this->user);
        $profile->setTheme(substr(self::TEXT, $number, self::TEXT_LENGTH_SHORT));
        $profile->setAbout(substr(self::TEXT, $number, self::TEXT_LENGTH_SHORT));
        $profile->setBiography(substr(self::TEXT, rand($number, $this->randomNumber), self::TEXT_LENGTH_SHORT));
        $profile->setCountry('Randomnia' . $number);

        return $profile;
    }
}
