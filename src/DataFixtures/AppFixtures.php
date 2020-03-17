<?php
namespace App\DataFixtures;

use App\Entity\Profile;
use App\Entity\Story;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

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
    const RANDOM_NUMBER = 20;
    const USERS_AMOUNT = 30;

    /**
     * @var User|null $user
     */
    private $user;

    public function load(ObjectManager $manager)
    {
        $this->generateUsers(self::USERS_AMOUNT, $manager);
        $manager->flush();
    }

    private function generateUsers($howMany, ObjectManager $manager)
    {
        for ($counter = 0; $counter < $howMany; $counter++) {
            $user = new User(
                'user' . $counter,
                'passwor'. $counter .'d',
                'exampleEmail' . $counter . '@exxampledomain.com'
            );
            $this->user = $user;
            $user->setProfile($this->createUserProfile($counter));
            $user->setRoles(['ROLE_USER']);
            $user->setStories($this->generateStories(rand($counter, $counter + self::RANDOM_NUMBER), $user));
            $manager->persist($user);

        }
    }

    private function generateStories($howMany, User $user)
    {
        $stories = [];

        for ($counter = 0; $counter < $howMany; $counter++) {
            $title = substr(self::TEXT, rand(self::TEXT_LENGTH_SHORT, self::TEXT_LENGTH_LONG), rand(++$counter, self::TEXT_LENGTH_LONG));
            $body = substr(self::TEXT, rand($counter, self::TEXT_LENGTH_LONG + $counter), $counter * self::RANDOM_NUMBER);
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
        $profile->setBiography(substr(self::TEXT, rand($number, self::RANDOM_NUMBER), self::TEXT_LENGTH_SHORT));
        $profile->setCountry('Randomnia' . $number);

        return $profile;
    }
}
