<?php

namespace ALR\APIBundle\Controller;

use ALR\APIBundle\Entity\AEntity;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class APIController extends FOSRestController
{
    protected $entity;
    protected $params;
    protected $data;
    protected $repositoryName;
    protected $formType;

    public function getSecureResourceAction()
    {
        if (false === $this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw new AccessDeniedException();
        }
    }

    /**
     * @return View
     */
    protected function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        if (sizeof($this->params) > 0) {
            $data = $em->getRepository($this->repositoryName)->findBy([
                $this->params['field'] => $this->params['value']
            ]);
        } else {
            $data = $em->getRepository($this->repositoryName)->findAll();
        }
        return $this->returnRESTApiView($data);
    }

    /**
     * @param int $id
     * @return View
     */
    protected function showAction($id)
    {
        $this->returnEntity($id);

        return $this->returnRESTApiView($this->entity);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return View|\Symfony\Component\Form\Form
     */
    protected function postAction(Request $request)
    {
        $form = $this->processForm($request);
        if (!$form->isValid()) {
            $errors = $this->getErrorsFromForm($form);

            return new Response($this->json($errors), 400);
        }
        return $this->returnRESTApiView($this->submitData($form, 1));
    }

    /**
     * @param int $id
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return View|\Symfony\Component\Form\Form
     */
    protected function putAction($id, Request $request)
    {
        $this->returnEntity($id, $this->repositoryName);

        $form = $this->processForm($request);
        if (!$form->isValid()) {
            $errors = $this->getErrorsFromForm($form);

            return new Response($this->json($errors), 400);
        }
        return $this->returnRESTApiView($this->submitData($form, 2));
    }

    /**
     * @param int $id
     * @return View
     */
    protected function removeAction($id)
    {
        $this->removeEntity($id);

        return $this->returnRESTApiView($this->entity);
    }

    /**
     * @param int $id
     * @return View
     */
    protected function deleteAction($id)
    {
        $entity = $this->removeEntity($id, 2);

        return $this->returnRESTApiView($entity);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\Form\Form
     */
    private function processForm(Request $request): \Symfony\Component\Form\Form
    {
        $form = $this->createForm($this->formType, $this->entity, [
            'csrf_protection' => false,
        ]);
        $form->submit($request->request->all());

        return $form;
    }

    /**
     * @param $data
     * @return View
     */
    protected function returnRESTApiView($data): Response
    {
        $view = $this->view($data, 200)
            ->setTemplate('APIBundle:API:index.html.twig')
            ->setTemplateVar('data');
        return $this->handleView($view);
    }

    /**
     * @param $form
     * @param int $type
     * @return AEntity
     */
    private function submitData($form, $type = 1)
    {
        $entity = $form->getData();

        $em = $this->getDoctrine()->getManager();
        if ($type == 1) {
            $em->persist($entity);
        }
        $em->flush();

        return $entity;
    }

    /**
     * @param $id
     */
    private function returnEntity($id): void
    {
        $em = $this->getDoctrine()->getManager();
        if (sizeof($this->params) > 0) {
            $this->entity = $em->getRepository($this->repositoryName)->findOneBy([
                $this->params['field'] => $this->params['value'],
                'id' => $id
            ]);
            return;
        }
        $this->entity = $this->getEntity($this->repositoryName)->find($id);
    }

    protected function getEntity($repository, $id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository($repository)->find($id);

        if (!is_object($entity)) {
            throw $this->createNotFoundException('O registro não foi localizado');
        }
        return $entity;
    }

    /**
     * @param int $id
     * @param int $type
     */
    private function removeEntity($id, $type = 1): void
    {
        $this->returnEntity($id, $this->repositoryName);
        $em = $this->getDoctrine()->getManager();
        switch ($type) {
            case 1 :
                if ($this->entity->getStatus() == 1) {
                    $this->entity->setStatus(2);
                }
                break;
            case 2:
                $em->remove($this->entity);
                break;
        }
        $em->flush();
    }

    /**
     * Convert exception to JSON
     * @param $form
     * @return array
     */
    private function getErrorsFromForm($form)
    {
        $errors = array();
        foreach ($form->getErrors(true) as $error) {
            $errors[] = $error->getMessage();
        }
        foreach ($form->all() as $childForm) {
            if ($childForm instanceof FormInterface) {
                if ($childErrors = $this->getErrorsFromForm($childForm)) {
                    $errors[$childForm->getName()] = $childErrors;
                }
            }
        }
        return $errors;
    }
}
