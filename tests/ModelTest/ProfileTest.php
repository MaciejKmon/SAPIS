<?php
namespace Test\ModelTest;

use App\Entity\Profile;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class ProfileTest extends TestCase
{
    public function testEntity ()
    {
        $eoin = new User('Eoin', 'Eoin23password', "EoinSome@gmailer.com");
        $eoinProfile = new Profile($eoin);
        $eoinProfile->setCountry('New Zealand');
        $eoinProfile->setTheme('Sample Text');
        $text = 'Sample Text';

        $eoinProfile->setBiography($text);
        $eoinProfile->setAbout($text);

        $this->assertInstanceOf(User::class, $eoinProfile->getOwner());
        $this->assertEquals('Eoin', $eoinProfile->getOwner()->getUsername());
        $this->assertNotNull($eoinProfile->getAbout());
        $this->assertEquals($text, $eoinProfile->getTheme());
        $this->assertEquals($text, $eoinProfile->getBiography());
    }
}
