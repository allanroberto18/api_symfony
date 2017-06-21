<?php

namespace SMS\SMSSimBundle\Controller;

use ALR\APIBundle\Controller\APIController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

class MensagemController extends APIController
{
    /**
     * @Rest\Get("/mensagens")
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
    public function getMensagemsAction()
    {
        $this->repositoryName = 'SMSSimBundle:Mensagem';

        return parent::indexAction();
    }

    /**
     * @Rest\Get("/mensagens/{id}")]
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
     *  output="SMS\SMSSimBundle\Entity\Mensagem"
     * )
     */
    public function getMensagemAction($id)
    {
        $this->repositoryName = 'SMSSimBundle:Mensagem';

        return parent::showAction($id);
    }

    /**
     * @Rest\Post("/mensagens")
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
     *  input="SMS\SMSSimBundle\Form\Type\MensagemType",
     *  output="SMS\SMSSimBundle\Entity\Mensagem"
     * )
     */
    public function postMensagemAction(Request $request)
    {
        $this->formType = 'SMS\SMSSimBundle\Form\MensagemType';

        return parent::postAction($request);
    }

    /**
     * @Rest\Put("/mensagens/{id}")
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
     *  input="SMS\SMSSimBundle\Form\Type\MensagemType",
     *  output="SMS\SMSSimBundle\Entity\Mensagem"
     * )
     */
    public function putMensagemAction($id, Request $request)
    {
        $this->repositoryName = 'SMSSimBundle:Mensagem';
        $this->formType = 'SMS\SMSSimBundle\Form\MensagemType';

        return parent::putAction($id, $request);
    }

    /**
     * @Rest\Get("/mensagens/{id}/remove")
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
     *  output="SMS\SMSSimBundle\Entity\Mensagem"
     * )
     */
    public function removeMensagemAction($id)
    {
        $this->repositoryName = 'SMSSimBundle:Mensagem';

        return parent::removeAction($id);
    }

    /**
     * @Rest\Delete("/mensagens/{id}")
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
     *  output="SMS\SMSSimBundle\Entity\Mensagem"
     * )
     */
    public function deleteMensagemAction($id)
    {
        $this->repositoryName = 'SMSSimBundle:Mensagem';

        return parent::deleteAction($id);
    }
}
