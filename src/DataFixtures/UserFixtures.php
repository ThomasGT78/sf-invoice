<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private UserPasswordEncoderInterface $encoder;

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager )
    {
        $user = new User();
        $user->setEmail("user1@email.com")
            ->setRoles(["ROLE_INVOICE_USER"])
            ->setPassword($this->encoder->encodePassword($user, "123"));

        $manager->persist($user);

        $user = new User();
        $user->setEmail("user2@email.com")
            ->setRoles(["ROLE_ADMIN"])
            ->setPassword($this->encoder->encodePassword($user, "123"));

        $manager->persist($user);

        $manager->flush();
    }
}
