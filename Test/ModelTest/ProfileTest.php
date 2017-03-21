<?php
namespace Test\ModelTest;

use Entity\Profile;
use Entity\User;
use PHPUnit\Framework\TestCase;

class ProfileTest extends TestCase
{
    public function testOwner ()
    {
        $eoin = new User('Eoin', 'Eoin23password');
        $eoinProfile = new Profile($eoin);
        $eoinProfile->setCountry('New Zealand');
        $eoinProfile->setTheme('Sample profile theme');
        $text = 'Sample Text';

        if(file_exists('../Resources/story.txt')) {
            $text = file_get_contents('../Resources/story.txt');
        }

        $eoinProfile->setBiography($text);
        $eoinProfile->setAbout($text);

        $this->assertInstanceOf(User::class, $eoinProfile->getOwner());
        $this->assertEquals('Eoin', $eoinProfile->getOwner()->getUsername());
        $this->assertNotNull($eoinProfile->getAbout());
        $this->assertEquals($text, $eoinProfile->getTheme());
        $this->assertEquals($text, $eoinProfile->getBiography());
    }
}
