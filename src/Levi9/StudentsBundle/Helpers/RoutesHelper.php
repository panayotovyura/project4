<?php

namespace Levi9\StudentsBundle\Helpers;

use Doctrine\ORM\EntityManager;
use Levi9\StudentsBundle\Helpers\PathGenerator;

class RoutesHelper
{
    const BATCH_SIZE = 200;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var PathGenerator
     */
    private $pathGenerator;

    public function __construct(EntityManager $entityManager, PathGenerator $pathGenerator)
    {
        $this->entityManager = $entityManager;
        $this->pathGenerator = $pathGenerator;
    }

    /*
     * Generate routes for students
     */
    public function generateRoutes()
    {
        $query = $this->entityManager->createQuery('select u from Levi9\StudentsBundle\Entity\Student u');
        $queryIterator = $query->iterate();
        $i = 0;
        foreach ($queryIterator as $row) {
            $student = $row[0];
            $student->setPath($this->pathGenerator->generatePath($student->getName()));
            if (($i % self::BATCH_SIZE) === 0) {
                $this->entityManager->flush();
                $this->entityManager->clear();
            }
            ++$i;
        }
        $this->entityManager->flush();
    }
}