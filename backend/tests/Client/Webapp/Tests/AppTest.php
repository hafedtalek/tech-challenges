<?php
namespace Client\Webapp\Tests;

use Silex\WebTestCase;

define('ROOT_PATH', realpath('.'));

class AppTest extends WebTestCase
{
    public function createApplication()
    {
        return require ROOT_PATH . '/src/Client/Webapp/app.php';
    }

    public function testApiRoot()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');
        $response = $client->getResponse();

        $this->assertTrue($response->isOk());
        $this->assertEquals('Status OK', $response->getContent());

        $crawler = $client->request('GET', '/api/v1/Client/Surveys');
        $response = $client->getResponse();

        $this->assertTrue($response->isOk());
        $this->assertEquals('Paris', $response->getContent()[0]->name);

        $crawler = $client->request('POST',["option", ["product1"]] '/api/v1/Client/Surveys');
        $response = $client->getResponse();

        $this->assertTrue($response->isOk());
        $this->assertEquals('Paris', $response->getContent()[0]->name);
        
    }
}
