<?php

namespace SMS\SMSSimBundle\Controller;

use ALR\APIBundle\Controller\APIController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

class ClienteController extends APIController
{
    /**
     * @Rest\Get("/clientes")
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
    public function getClientesAction()
    {
        $this->repositoryName = 'SMSSimBundle:Cliente';

        return parent::indexAction();
    }

    /**
     * @Rest\Get("/clientes/{id}")]
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
     *  output="SMS\SMSSimBundle\Entity\Cliente"
     * )
     */
    public function getClienteAction($id)
    {
        $this->repositoryName = 'SMSSimBundle:Cliente';

        return parent::showAction($id);
    }

    /**
     * @Rest\Post("/clientes")
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
     *  input="SMS\SMSSimBundle\Form\Type\ClienteType",
     *  output="SMS\SMSSimBundle\Entity\Cliente"
     * )
     */
    public function postClienteAction(Request $request)
    {
        $this->formType = 'SMS\SMSSimBundle\Form\ClienteType';

        return parent::postAction($request);
    }

    /**
     * @Rest\Put("/clientes/{id}")
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
     *  input="SMS\SMSSimBundle\Form\Type\ClienteType",
     *  output="SMS\SMSSimBundle\Entity\Cliente"
     * )
     */
    public function putClienteAction($id, Request $request)
    {
        $this->repositoryName = 'SMSSimBundle:Cliente';
        $this->formType = 'SMS\SMSSimBundle\Form\ClienteType';

        return parent::putAction($id, $request);
    }

    /**
     * @Rest\Get("/clientes/{id}/remove")
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
     *  output="SMS\SMSSimBundle\Entity\Cliente"
     * )
     */
    public function removeClienteAction($id)
    {
        $this->repositoryName = 'SMSSimBundle:Cliente';

        return parent::removeAction($id);
    }

    /**
     * @Rest\Delete("/clientes/{id}")
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
     *  output="SMS\SMSSimBundle\Entity\Cliente"
     * )
     */
    public function deleteClienteAction($id)
    {
        $this->repositoryName = 'SMSSimBundle:Cliente';

        return parent::deleteAction($id);
    }
}
