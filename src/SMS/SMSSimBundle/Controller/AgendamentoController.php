<?php

namespace SMS\SMSSimBundle\Controller;

use ALR\APIBundle\Controller\APIController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

class AgendamentoController extends APIController
{
    /**
     * @Rest\Get("/agendamentos")
     * @return View
     * @ApiDoc(
     *  resource=false,
     *  description="Retornando uma coleção de entidades",
     *  statusCodes = {
     *     200 = "Registros localizados com sucesso",
     *     404 = "Registros não localizados"
     *   },
     *  output="Doctrine\Common\Collections\ArrayCollection"
     * )
     */
    public function getAgendamentosAction()
    {
        $this->repositoryName = 'SMSSimBundle:Agendamento';

        return parent::indexAction();
    }

    /**
     * @Rest\Get("/agendamentos/{id}")]
     * @param int $id
     * @return View
     * @ApiDoc(
     *  resource=false,
     *  description="Retornando uma entitde",
     *  statusCodes = {
     *     200 = "Registro localizado com sucesso",
     *     404 = "Registro não localizado"
     *   },
     *  requirements={
     *      {
     *          "name"="id",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="id da entidade"
     *      }
     *  },
     *  output="SMS\SMSSimBundle\Entity\Agendamento"
     * )
     */
    public function getAgendamentoAction($id)
    {
        $this->repositoryName = 'SMSSimBundle:Agendamento';

        return parent::showAction($id);
    }

    /**
     * @Rest\Post("/agendamentos")
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return View|\Symfony\Component\Form\Form
     * @ApiDoc(
     *  resource=true,
     *  description="Inserindo entidade",
     *  statusCodes = {
     *     200 = "Registro inserido com sucesso"
     *   },
     *  requirements={
     *      {
     *          "name"="request",
     *          "dataType"="\Symfony\Component\HttpFoundation\Request",
     *          "requirement"="\d+",
     *          "description"="Dados do Formulário"
     *      }
     *  },
     *  input="SMS\SMSSimBundle\Form\Type\AgendamentoType",
     *  output="SMS\SMSSimBundle\Entity\Agendamento"
     * )
     */
    public function postAgendamentoAction(Request $request)
    {
        $this->formType = 'SMS\SMSSimBundle\Form\AgendamentoType';

        return parent::postAction($request);
    }

    /**
     * @Rest\Put("/agendamentos/{id}")
     * @param int $id
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return View|\Symfony\Component\Form\Form
     * @ApiDoc(
     *  resource=true,
     *  description="Atualizando entidade",
     *  statusCodes = {
     *     200 = "Registro atualizado com sucesso",
     *     404 = "Registro não localizado"
     *   },
     *  requirements={
     *      {
     *          "name"="id",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="id da entidade"
     *      },
     *      {
     *          "name"="request",
     *          "dataType"="\Symfony\Component\HttpFoundation\Request",
     *          "requirement"="\d+",
     *          "description"="Dados do Formulário"
     *      }
     *  },
     *  input="SMS\SMSSimBundle\Form\Type\AgendamentoType",
     *  output="SMS\SMSSimBundle\Entity\Agendamento"
     * )
     */
    public function putAgendamentoAction($id, Request $request)
    {
        $this->repositoryName = 'SMSSimBundle:Agendamento';
        $this->formType = 'SMS\SMSSimBundle\Form\AgendamentoType';

        return parent::putAction($id, $request);
    }

    /**
     * @Rest\Get("/agendamentos/{id}/remove")
     * @param int $id
     * @return View
     * @ApiDoc(
     *  resource=false,
     *  description="Alterando status da entidade",
     *  statusCodes = {
     *     200 = "Registro removido com sucesso",
     *     404 = "Registro não localizado"
     *   },
     *  requirements={
     *      {
     *          "name"="id",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="id da entidade"
     *      }
     *  },
     *  output="SMS\SMSSimBundle\Entity\Agendamento"
     * )
     */
    public function removeAgendamentoAction($id)
    {
        $this->repositoryName = 'SMSSimBundle:Agendamento';

        return parent::removeAction($id);
    }

    /**
     * @Rest\Delete("/agendamentos/{id}")
     * @param int $id
     * @return View
     * @ApiDoc(
     *  resource=false,
     *  description="Excluindo a entidade",
     *  statusCodes = {
     *     200 = "Registro excluído com sucesso",
     *     404 = "Registro não localizado"
     *   },
     *  requirements={
     *      {
     *          "name"="id",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="id da entidade"
     *      }
     *  },
     *  output="SMS\SMSSimBundle\Entity\Agendamento"
     * )
     */
    public function deleteAgendamentoAction($id)
    {
        $this->repositoryName = 'SMSSimBundle:Agendamento';

        return parent::deleteAction($id);
    }
}
