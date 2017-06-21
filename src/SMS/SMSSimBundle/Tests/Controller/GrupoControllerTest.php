<?php

namespace SMS\SMSSimBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GrupoControllerTest extends WebTestCase
{
    public function testGetgrupos()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/grupos');
    }

    public function testGetgrupo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/grupos/{id}');
    }

    public function testPostgrupo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/grupos');
    }

    public function testPutgrupo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/grupos/{id}');
    }

    public function testRemovegrupos()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/grupos/{id}/remove');
    }

    public function testDeletegrupo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/grupos/{id}');
    }

}
