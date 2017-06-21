<?php

namespace SMS\SMSSimBundle\Controller;

use ALR\APIBundle\Controller\APIController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

class GrupoController extends APIController
{
    /**
     * @Rest\Get("cliente/{cliente}/grupos")
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
    public function getGruposAction($cliente)
    {
        $this->repositoryName = 'SMSSimBundle:Grupo';

        $this->params['field'] = 'cliente';
        $this->params['value'] = $cliente;

        $this->getEntity('SMSSimBundle:Cliente', $cliente);

        return parent::indexAction();
    }

    /**
     * @Rest\Get("cliente/{cliente}/grupos/{id}")]
     * @param int $cliente
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
     *     {
     *          "name"="cliente",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="código do cliente"
     *      },
     *      {
     *          "name"="id",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="id da entidade"
     *      }
     *  },
     *  output="SMS\SMSSimBundle\Entity\Grupo"
     * )
     */
    public function getGrupoAction($cliente, $id)
    {
        $this->repositoryName = 'SMSSimBundle:Grupo';

        $this->params['field'] = 'cliente';
        $this->params['value'] = $cliente;

        $this->getEntity('SMSSimBundle:Cliente', $cliente);

        return parent::showAction($id);
    }

    /**
     * @Rest\Post("cliente/{cliente}/grupos")
     * @param int $cliente
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return View|\Symfony\Component\Form\Form
     * @ApiDoc(
     *  resource=true,
     *  description="Inserindo entidade",
     *  statusCodes = {
     *     200 = "Registro inserido com sucesso"
     *   },
     *  requirements={
     *     {
     *          "name"="cliente",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="código do cliente"
     *      },
     *      {
     *          "name"="request",
     *          "dataType"="\Symfony\Component\HttpFoundation\Request",
     *          "requirement"="\d+",
     *          "description"="Dados do Formulário"
     *      }
     *  },
     *  input="SMS\SMSSimBundle\Form\Type\GrupoType",
     *  output="SMS\SMSSimBundle\Entity\Grupo"
     * )
     */
    public function postGrupoAction($cliente, Request $request)
    {
        $this->formType = 'SMS\SMSSimBundle\Form\GrupoType';

        $this->params['field'] = 'cliente';
        $this->params['value'] = $cliente;

        $this->getEntity('SMSSimBundle:Cliente', $cliente);

        $request->request->set('cliente', $cliente);

        return parent::postAction($request);
    }

    /**
     * @Rest\Put("cliente/{cliente}/grupos/{id}")
     * @param int $cliente
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
     *     {
     *          "name"="cliente",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="código do cliente"
     *      },
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
     *  input="SMS\SMSSimBundle\Form\Type\GrupoType",
     *  output="SMS\SMSSimBundle\Entity\Grupo"
     * )
     */
    public function putGrupoAction($cliente, $id, Request $request)
    {
        $this->repositoryName = 'SMSSimBundle:Grupo';
        $this->formType = 'SMS\SMSSimBundle\Form\GrupoType';

        $this->params['field'] = 'cliente';
        $this->params['value'] = $cliente;

        $this->getEntity('SMSSimBundle:Cliente', $cliente);

        $request->request->set('cliente', $cliente);

        return parent::putAction($id, $request);
    }

    /**
     * @Rest\Get("cliente/{cliente}/grupos/{id}/remove")
     * @param int $id
     * @param int $cliente
     * @return View
     * @ApiDoc(
     *  resource=false,
     *  description="Alterando status da entidade",
     *  statusCodes = {
     *     200 = "Registro removido com sucesso",
     *     404 = "Registro não localizado"
     *   },
     *  requirements={
     *     {
     *          "name"="cliente",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="código do cliente"
     *      },
     *      {
     *          "name"="id",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="id da entidade"
     *      }
     *  },
     *  output="SMS\SMSSimBundle\Entity\Grupo"
     * )
     */
    public function removeGrupoAction($cliente, $id)
    {
        $this->repositoryName = 'SMSSimBundle:Grupo';

        $this->params['field'] = 'cliente';
        $this->params['value'] = $cliente;

        return parent::removeAction($id);
    }

    /**
     * @Rest\Delete("cliente/{cliente}/grupos/{id}")
     * @param int $cliente
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
     *     {
     *          "name"="cliente",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="código do cliente"
     *      },
     *      {
     *          "name"="id",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="id da entidade"
     *      }
     *  },
     *  output="SMS\SMSSimBundle\Entity\Grupo"
     * )
     */
    public function deleteGrupoAction($cliente, $id)
    {
        $this->repositoryName = 'SMSSimBundle:Grupo';

        $this->params['field'] = 'cliente';
        $this->params['value'] = $cliente;

        return parent::deleteAction($id);
    }
}
