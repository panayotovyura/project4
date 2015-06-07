<?php

namespace Levi9\StudentsBundle\Tests\Helpers;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Levi9\StudentsBundle\Helpers\PathGenerator;

class PathGeneratorTest extends WebTestCase
{
    /**
     * @dataProvider pathGeneratorProvider
     */
    public function testPathGenerator($names)
    {
        $pathGenerator = new PathGenerator();

        foreach ($names as $path => $name) {
            $this->assertEquals(
                $pathGenerator->generatePath($name),
                $path
            );
        }
    }

    public function pathGeneratorProvider()
    {
        return [
            [
                [
                    'yura_panayotov' => 'Yura Panayotov',
                    'yura_panayotov_1' => 'Yura Panayotov',
                    'yura_panayotov_2' => 'Yura Panayotov',
                    'yura_panayotov_3' => 'Yura Panayotov',
                ]
            ],
            [
                [
                    'vasia_dos_santos' => 'Vasia Dos\'Santos',
                    'irina___vasileva' => 'Irina   Vasileva',
                    'leonid_sergeev_' => 'LeonID Sergeev ',
                    'leonid_sergeev__1' => 'Leonid SergEEv ',
                    'leonid_sergeev' => 'Leonid sergeev',
                ]
            ]
        ];
    }
}
