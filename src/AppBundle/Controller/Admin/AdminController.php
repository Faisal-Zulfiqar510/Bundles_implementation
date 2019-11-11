<?php

namespace AppBundle\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{
    public function ChangeEnableStatusAction()
    {
        $id = $this->request->query->get('id');
        $this->get('app.service.user_service')->changeEnableStatus($id);

        $this->addFlash('success', sprintf('User status Updated'));

        return $this->redirectToRoute('easyadmin', [
            'action' => 'show',
            'entity' => $this->request->query->get('entity'),
            'id' => $id,
        ]);

    }
}