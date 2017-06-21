<?php

namespace SMS\SMSSimBundle\Entity;

use ALR\APIBundle\Entity\AEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as JMS;

/**
 * Grupo
 * @JMS\ExclusionPolicy("all")
 * @ORM\Table(name="grupo")
 * @ORM\Entity(repositoryClass="SMS\SMSSimBundle\Repository\GrupoRepository")
 */
class Grupo extends AEntity
{
    /**
     * @var string
     * @JMS\Expose
     * @Assert\NotBlank(message="O campo nome é obrigatório")
     * @ORM\Column(type="string", length=125, nullable=false)
     */
    private $nome;

    /**
     * @var Cliente
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="grupos")
     * @Assert\NotBlank(message="O responsável pelo grupo não foi informado")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id", )
     */
    private $cliente;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Contato", inversedBy="grupos", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="grupos_contatos",
     *     joinColumns={@ORM\JoinColumn(name="grupo_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="contato_id", referencedColumnName="id")}
     * )
     */
    private $contatos;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Mensagem", mappedBy="grupos", fetch="EXTRA_LAZY")
     */
    private $mensagens;

    /**
     * Grupo constructor.
     */
    public function __construct()
    {
        $this->contatos = new ArrayCollection();
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
    public function getContatos()
    {
        return $this->contatos;
    }

    /**
     * @param Contato $contato
     */
    public function setContatos($contato)
    {
        $this->contatos[] = $contato;
    }

    /**
     * @return ArrayCollection
     */
    public function getMensagens()
    {
        return $this->mensagens;
    }

    /**
     * @param Mensagem $mensagem
     */
    public function setMensagens($mensagem)
    {
        $this->mensagens[] = $mensagem;
    }
}

