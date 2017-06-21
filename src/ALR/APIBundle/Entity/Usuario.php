<?php

namespace ALR\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Usuario
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="ALR\APIBundle\Repository\UsuarioRepository")
 */
class Usuario extends BaseUser
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \SMS\SMSSimBundle\Entity\Cliente
     * @ORM\OneToOne(targetEntity="\SMS\SMSSimBundle\Entity\Cliente", mappedBy="usuario")
     */
    private $cliente;

    /**
     * @return \SMS\SMSSimBundle\Entity\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param \SMS\SMSSimBundle\Entity\Cliente $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    public function __construct()
    {
        parent::__construct();
    }
}

