<?php

namespace SMS\SMSSimBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SMS\SMSSimBundle\Entity\Grupo;

class LoadGrupoData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $i = 0;
        $arr = [ 'Todos', 'Clientes Ativos', 'Clientes Inativos', 'Cobranças', 'Inadimplentes' ];
        while (sizeof($arr) > $i) {
            $g = $this->mountEntityu($arr[$i], $this->getReference('cliente1'));
            $manager->persist($g);
            $i++;
        }

        $i = 0;
        while (sizeof($arr) > $i) {
            $g = $this->mountEntityu($arr[$i], $this->getReference('cliente2'));
            $manager->persist($g);
            $i++;
        }
        $manager->flush();
    }

    private function mountEntityu($name, $cliente) : Grupo {
        $entity = new Grupo();
        $entity->setNome($name);
        $entity->setCliente($cliente);

        return $entity;
    }

    public function getOrder() {
        return 3;
    }
}