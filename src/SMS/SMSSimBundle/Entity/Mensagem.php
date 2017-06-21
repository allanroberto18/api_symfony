<?php

namespace SMS\SMSSimBundle\Entity;

use ALR\APIBundle\Entity\AEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Entity
 * @ORM\Table(name="mensagems")
 * @JMS\ExclusionPolicy("all")
 */
class Mensagem extends AEntity
{
    /**
     * @var string
     * @JMS\Expose
     * @ORM\Column(type="text", nullable=false)
     */
    private $texto;

    /**
     * @var Cliente
     * @JMS\Expose
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="mensagens")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    private $cliente;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Agendamento", inversedBy="mensagens", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="mensagens_agendamentos",
     *     joinColumns={@ORM\JoinColumn(name="mensagem_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="agendamento_id", referencedColumnName="id")}
     * )
     */
    private $agendamentos;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Contato", inversedBy="mensagens", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="mensagens_contatos",
     *     joinColumns={@ORM\JoinColumn(name="mensagem_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="contato_id", referencedColumnName="id")}
     * )
     */
    private $contatos;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Grupo", inversedBy="mensagens", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="mensagens_grupos",
     *     joinColumns={@ORM\JoinColumn(name="mensagem_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="grupo_id", referencedColumnName="id")}
     * )
     */
    private $grupos;

    /**
     * Mensagem constructor.
     */
    public function __construct()
    {
        $this->agendamentos = new ArrayCollection();
        $this->contatos = new ArrayCollection();
        $this->grupos = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @param string $texto
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
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
    public function getAgendamentos()
    {
        return $this->agendamentos;
    }

    /**
     * @param ArrayCollection $agendamento
     */
    public function setAgendamentos($agendamento)
    {
        $this->agendamentos[] = $agendamento;
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


}