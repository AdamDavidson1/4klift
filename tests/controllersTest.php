<?php

use Silex\WebTestCase;

/**
 * Class controllersTest.
 */
class controllersTest extends WebTestCase
{
    /**
     * Homepage test.
     */
    public function testGetHomepage()
    {
        $client = $this->createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET', '/');
        $this->assertTrue($client->getResponse()->isOk());
        $this->assertContains('4klift', $crawler->filter('body')->text());
    }

    /**
     * Create Application.
     *
     * @return mixed
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../src/app.php';
        require __DIR__.'/../cfg/dev.php';
        require __DIR__.'/../src/controllers.php';
        $app['session.test'] = true;

        return $this->app = $app;
    }
}
