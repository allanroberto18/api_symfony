<?php

namespace SMS\SMSSimBundle\Entity;

use ALR\APIBundle\Entity\AEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\ExclusionPolicy("all")
 * @ORM\Entity
 * @ORM\Table(name="agendamentos")
 */
class Agendamento extends AEntity
{
    /**
     * @var \DateTime
     * @ORM\Column(type="date", nullable=false)
     */
    private $data_disparo;

    /**
     * @var Cliente
     * @JMS\Expose
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="agendamentos")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    private $cliente;

    /**
     * @ORM\ManyToMany(targetEntity="Mensagem", mappedBy="agendamentos", fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    private $mensagens;

    /**
     * Agendamento constructor.
     */
    public function __construct()
    {
        $this->mensagens = new ArrayCollection();
    }

    /**
     * @return \DateTime
     */
    public function getDataDisparo()
    {
        return $this->data_disparo;
    }

    /**
     * @param \DateTime $data_disparo
     */
    public function setDataDisparo($data_disparo)
    {
        $this->data_disparo = $data_disparo;
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