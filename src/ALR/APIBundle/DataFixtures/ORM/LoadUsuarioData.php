<?php

namespace ALR\APIBundle\DataFixtures\ORM;

use ALR\APIBundle\Entity\AccessToken;
use ALR\APIBundle\Entity\Client;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ALR\APIBundle\Entity\Usuario;

class LoadUsuarioData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $client = new Client();
        $client->setRandomId('1qmn7t878nms8csk8gcscw044k0ocs84ooksc88o48oc0sscgs');
        $client->setRedirectUris([]);
        $client->setAllowedGrantTypes(['password']);
        $client->setSecret('5a53qahie0gs0gc00ggsc080s8c0ggc0w8kc8ckgokg40gcg8s');

        $manager->persist($client);

        $user1 = $this->mountEntityu('allanroberto18', 'allanroberto18@gmail.com', 'kerberos280104');
        $manager->persist($user1);

        $user2 = $this->mountEntityu('delmorodrigues', 'delmorodrigues@gmail.com', 'smssim');
        $manager->persist($user2);

        $manager->flush();

        $accessToken1 = new AccessToken();
        $accessToken1->setClient($client);
        $accessToken1->setUser($user1);
        $accessToken1->setToken('ZWFiMTljNjliOGE2YjA2MjdkN2VlZThjMGU3ZjEzZDMzMDhjOTQ4NjcxMDcyMzdiMDQ0N2VkNWY4OGE1MmI3MA');
        $accessToken1->setExpiresAt('1498668720');

        $manager->persist($accessToken1);

        $accessToken2 = new AccessToken();
        $accessToken2->setClient($client);
        $accessToken2->setUser($user2);
        $accessToken2->setToken('MGU3NzM3YjkxNWE1OTFlYjU4ZDRhNGM4ODRkOThkOWJjZDkzMTY1MjJiZjkyNTc1NjMzOTEyMTc1NzA2YWJjZA');
        $accessToken2->setExpiresAt('1498668720');

        $manager->persist($accessToken2);

        $manager->flush();

        $this->addReference('user1', $user1);
        $this->addReference('user2', $user2);
    }

    private function mountEntityu($name, $email, $password) : Usuario
    {
        $entity = new Usuario();
        $entity->setUsername($name);
        $entity->setEmail($email);
        $entity->setPlainPassword($password);
        $entity->setEnabled(true);
        return $entity;
    }

    public function getOrder() {
        return 1;
    }
}