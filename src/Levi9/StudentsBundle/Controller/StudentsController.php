<?php

namespace Levi9\StudentsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Levi9\StudentsBundle\Entity\Student;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

class StudentsController extends Controller
{

    /**
     * Show student detail information.
     *
     * @param Student $student
     * @return array
     *
     * @Route("/students/detail/{path}")
     * @Cache(expires="15 minutes", public=true)
     * @Template
     */
    public function detailAction(Student $student)
    {
        return ['student' => $student];
    }
}
