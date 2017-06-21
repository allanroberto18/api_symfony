<?php

namespace SMS\SMSSimBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SMS\SMSSimBundle\Entity\Cliente;

class LoadClienteData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $c1 = $this->mountEntityu('Allan Roberto', '11111111111', $this->getReference('user1'));
        $manager->persist($c1);

        $c2 = $this->mountEntityu('Delmo Rodrigues', '22222222222', $this->getReference('user2'));
        $manager->persist($c2);
        $manager->flush();

        $this->addReference('cliente1', $c1);
        $this->addReference('cliente2', $c2);
    }

    private function mountEntityu($nome, $cpf, $usuario): Cliente
    {
        $entity = new Cliente();
        $entity->setNome($nome);
        $entity->setCpfCnpj($cpf);
        $entity->setUsuario($usuario);

        return $entity;
    }

    public function getOrder()
    {
        return 2;
    }
}