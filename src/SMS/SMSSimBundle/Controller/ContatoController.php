<?php

namespace SMS\SMSSimBundle\Controller;

use ALR\APIBundle\Controller\APIController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

class ContatoController extends APIController
{
    /**
     * @Rest\Get("/contatos")
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
    public function getContatosAction()
    {
        $this->repositoryName = 'SMSSimBundle:Contato';

        return parent::indexAction();
    }

    /**
     * @Rest\Get("/contatos/{id}")]
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
     *  output="SMS\SMSSimBundle\Entity\Contato"
     * )
     */
    public function getContatoAction($id)
    {
        $this->repositoryName = 'SMSSimBundle:Contato';

        return parent::showAction($id);
    }

    /**
     * @Rest\Post("/contatos")
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
     *  input="SMS\SMSSimBundle\Form\Type\ContatoType",
     *  output="SMS\SMSSimBundle\Entity\Contato"
     * )
     */
    public function postContatoAction(Request $request)
    {
        $this->formType = 'SMS\SMSSimBundle\Form\ContatoType';

        return parent::postAction($request);
    }

    /**
     * @Rest\Put("/contatos/{id}")
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
     *  input="SMS\SMSSimBundle\Form\Type\ContatoType",
     *  output="SMS\SMSSimBundle\Entity\Contato"
     * )
     */
    public function putContatoAction($id, Request $request)
    {
        $this->repositoryName = 'SMSSimBundle:Contato';
        $this->formType = 'SMS\SMSSimBundle\Form\ContatoType';

        return parent::putAction($id, $request);
    }

    /**
     * @Rest\Get("/contatos/{id}/remove")
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
     *  output="SMS\SMSSimBundle\Entity\Contato"
     * )
     */
    public function removeContatoAction($id)
    {
        $this->repositoryName = 'SMSSimBundle:Contato';

        return parent::removeAction($id);
    }

    /**
     * @Rest\Delete("/contatos/{id}")
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
     *  output="SMS\SMSSimBundle\Entity\Contato"
     * )
     */
    public function deleteContatoAction($id)
    {
        $this->repositoryName = 'SMSSimBundle:Contato';

        return parent::deleteAction($id);
    }
}
