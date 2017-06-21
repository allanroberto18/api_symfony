<?php

namespace SMS\SMSSimBundle\Entity;

use ALR\APIBundle\Entity\AEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
/**
 * @ORM\Entity
 * @JMS\ExclusionPolicy("all")
 * @ORM\Table(name="clientes")
 */
class Cliente extends AEntity
{
    /**
     * @var \ALR\APIBundle\Entity\Usuario
     * @ORM\OneToOne(targetEntity="\ALR\APIBundle\Entity\Usuario", inversedBy="cliente")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $usuario;

    /**
     * @var string
     * @JMS\Expose
     * @ORM\Column(type="string", length=155, nullable=false)
     */
    private $nome;

    /**
     * @var int
     * @JMS\Expose
     * @ORM\Column(type="integer")
     */
    private $tipo=1;

    /**
     * @var string
     * @JMS\Expose
     * @ORM\Column(type="string", length=25, nullable=false)
     */
    private $cpf_cnpj;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Contato", mappedBy="cliente", fetch="EXTRA_LAZY")
     */
    private $contatos;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Grupo", mappedBy="cliente", fetch="EXTRA_LAZY")
     */
    private $grupos;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Mensagem", mappedBy="cliente", fetch="EXTRA_LAZY")
     */
    private $mensagens;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Agendamento", mappedBy="cliente", fetch="EXTRA_LAZY")
     */
    private $agendamentos;

    /**
     * Cliente constructor.
     */
    public function __construct()
    {
        $this->contatos = new ArrayCollection();
        $this->grupos = new ArrayCollection();
        $this->mensagens = new ArrayCollection();
        $this->agendamentos = new ArrayCollection();
    }

    /**
     * @return \ALR\APIBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param \ALR\APIBundle\Entity\Usuario $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return string
     */
    public function getNome() : string
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
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param int $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return string
     */
    public function getCpfCnpj()
    {
        return $this->cpf_cnpj;
    }

    /**
     * @param string $cpf_cnpj
     */
    public function setCpfCnpj($cpf_cnpj)
    {
        $this->cpf_cnpj = $cpf_cnpj;
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
        $this->contatos = $contato;
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

    /**
     * @return ArrayCollection
     */
    public function getAgendamentos()
    {
        return $this->agendamentos;
    }

    /**
     * @param Agendamento $agendamento
     */
    public function setAgendamentos($agendamento)
    {
        $this->agendamentos[] = $agendamento;
    }
}