<?php

namespace Levi9\StudentsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class StudentsControllerTest extends WebTestCase
{
    public function testDetailsPage()
    {
        $client = static::createClient();

        $client->request(Request::METHOD_GET, '/students/detail/yura_panayotov_8');

        $response = $client->getResponse();

        $this->assertTrue($response->isSuccessful());

        $this->assertInstanceOf(
            'DateTime',
            $response->getExpires()
        );
    }
}
