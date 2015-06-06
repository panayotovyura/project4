<?php

namespace Levi9\StudentsBundle\Helpers;

use Doctrine\ORM\EntityManager;

class RoutesHelper
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function generateRoutes()
    {
        // routes generation
    }
}
