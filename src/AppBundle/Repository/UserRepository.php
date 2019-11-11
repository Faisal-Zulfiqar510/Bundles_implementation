<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;

class UserRepository extends EntityRepository
{
    public function updateStatus($id)
    {
        $entity = $this->find($id);
        $entity->setEnabled(!$entity->isEnabled());
        $this->getEntityManager()->flush();
    }
}