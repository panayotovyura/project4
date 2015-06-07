<?php

namespace Levi9\StudentsBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;

class StudentsLoader extends DataFixtureLoader
{
    /**
     * {@inheritDoc}
     */
    protected function getFixtures()
    {
        $fileName = 'fixtures.yml';
        if ($this->container->get('kernel')->getEnvironment() == 'test') {
            $fileName = 'fixtures_test.yml';
        }
        return  array(
            __DIR__ . '/' . $fileName,

        );
    }
}
