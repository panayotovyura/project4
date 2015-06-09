<?php

namespace Levi9\StudentsBundle\Entity;

use Doctrine\ORM\EntityRepository;

class StudentRepository extends EntityRepository
{
    public function getAllStudentsQuery()
    {
        return $this->_em->createQuery('select u from Levi9\StudentsBundle\Entity\Student u');
    }
}