<?php

namespace SMS\SMSSimBundle\Entity;

use ALR\APIBundle\Entity\AEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\ExclusionPolicy("all")
 * @ORM\Entity
 * @ORM\Table(name="contatos")
 */
class Contato extends AEntity
{
    /**
     * @var string
     * @JMS\Expose
     * @ORM\Column(type="string", length=125, nullable=false)
     */
    private $nome;

    /**
     * @var int
     * @JMS\Expose
     * @ORM\Column(type="integer")
     */
    private $sexo=0;

    /**
     * @var \DateTime
     * @JMS\Expose
     * @ORM\Column(type="date", nullable=true)
     */
    private $data_nascimento;

    /**
     * @var string
     * @JMS\Expose
     * @ORM\Column(type="string", length=15, nullable=false)
     */
    private $telefone;

    /**
     * @var Cliente
     * @JMS\Expose
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="contatos")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    private $cliente;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Grupo", mappedBy="contatos", fetch="EXTRA_LAZY")
     */
    private $grupos;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Mensagem", mappedBy="contatos", fetch="EXTRA_LAZY")
     */
    private $mensagens;

    /**
     * Contato constructor.
     */
    public function __construct()
    {
        $this->grupos = new ArrayCollection();
        $this->mensagens = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return int
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param int $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return \DateTime
     */
    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    /**
     * @param \DateTime $data_nascimento
     */
    public function setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    /**
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param string $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param Cliente $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return ArrayCollection
     */
    public function getGrupos()
    {
        return $this->grupos;
    }

    /**
     * @param Grupo $grupo
     */
    public function setGrupos($grupo)
    {
        $this->grupos[] = $grupo;
    }

    /**
     * @return ArrayCollection
     */
    public function getMensagem()
    {
        return $this->mensagens;
    }

    /**
     * @param Mensagem $mensagem
     */
    public function setMensagem($mensagem)
    {
        $this->mensagens[] = $mensagem;
    }
}