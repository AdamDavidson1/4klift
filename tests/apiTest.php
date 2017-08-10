<?php

/*
 * MIT License
 *
 * Copyright (c) 2017 Deasil Works, Inc
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

use Silex\WebTestCase;

/**
 * Class controllersTest.
 *
 * @backupGlobals disabled
 * @SuppressWarnings(PHPMD)
 */
class apiTest extends WebTestCase
{
    /**
     * API Get.
     */
    public function testApiGet()
    {
        /** @var \Symfony\Component\HttpKernel\Client $client */
        $client = $this->createClient();
        $client->followRedirects(true);

        $client->request('GET', '/api/cms/Data/Manager/pageDataManager/message');

        /** @var \Symfony\Component\HttpFoundation\Response $response */
        $response = $client->getResponse();

        $this->assertTrue($response->isOk());

        $ack = json_decode($response->getContent());

        $this->assertTrue(is_object($ack));

        $this->assertTrue($ack->success);

        $this->assertEquals('Test Message', $ack->payload);
    }

    /**
     * API Post JSON.
     */
    public function testApiPostJson()
    {
        /** @var \Symfony\Component\HttpKernel\Client $client */
        $client = $this->createClient();
        $client->followRedirects(true);

        $testMessage = 'From unit test!';
        $messageUrl = '/api/cms/Data/Manager/pageDataManager/message';

        $client->request(
            'POST', $messageUrl, [], [],
            [
                'CONTENT_TYPE' => 'application/json',
            ],
            '{"message":"'.$testMessage.'"}'
        );

        /** @var \Symfony\Component\HttpFoundation\Response $response */
        $response = $client->getResponse();

        $this->assertTrue($response->isOk());

        $ack = json_decode($response->getContent());

        $this->assertTrue(is_object($ack));

        $this->assertTrue($ack->success);

        $this->assertEquals($testMessage, $ack->payload);
    }

    /**
     * API Post JSON Model.
     */
    public function testApiPostJsonModel()
    {
        /** @var \Symfony\Component\HttpKernel\Client $client */
        $client = $this->createClient();
        $client->followRedirects(true);

        $pageUrl = '/api/cms/Data/Manager/pageDataManager/page';

        $client->request(
            'POST', $pageUrl, [], [],
            [
                'CONTENT_TYPE' => 'application/json',
            ],
            '
                {
                  "pageModel": {
                    "stub": "unit_test_post",
                    "content": "4klift API unit test was here.",
                    "title": "Unit Test POST"
                  }
                }
            '
        );

        /** @var \Symfony\Component\HttpFoundation\Response $response */
        $response = $client->getResponse();

        // TODO: figure out why this only fails on Travis
        if (getenv('SKIP_TEST') == 1) {
            echo "Skipping testApiPostJsonModel on Travis\n";

            return;
        }

        $this->assertTrue($response->isOk());

        $ack = json_decode($response->getContent());

        $this->assertTrue(is_object($ack));

        $this->assertTrue($ack->success);

        $this->assertEquals('deasilworks\CMS\CEF\Data\Model\PageDataModel', $ack->request_args[0]);
    }

    /**
     * API Update.
     */
    public function testApiUpdate()
    {
        $testMessage = 'From unit test!';
        $messageUrl = '/api/cms/Data/Manager/pageDataManager/message';

        /** @var \Symfony\Component\HttpKernel\Client $client */
        $client = $this->createClient();
        $client->followRedirects(true);

        $client->request(
            'UPDATE', $messageUrl, [], [],
            [
                'CONTENT_TYPE' => 'application/json',
            ],
            '{"message":"'.$testMessage.'"}'
        );

        /** @var \Symfony\Component\HttpFoundation\Response $response */
        $response = $client->getResponse();

        $this->assertTrue($response->isOk());

        $ack = json_decode($response->getContent());

        $this->assertTrue(is_object($ack));

        $this->assertTrue($ack->success);

        $this->assertEquals($testMessage, $ack->payload);
    }

    /**
     * API Get.
     */
    public function testApiOptions()
    {
        /** @var \Symfony\Component\HttpKernel\Client $client */
        $client = $this->createClient();
        $client->followRedirects(true);

        $client->request('OPTIONS', '/api/cms/Data/Manager/pageDataManager/message');

        /** @var \Symfony\Component\HttpFoundation\Response $response */
        $response = $client->getResponse();

        $this->assertTrue($response->isOk());

        $ack = json_decode($response->getContent());

        $this->assertTrue(is_object($ack));

        $this->assertTrue($ack->success);

        $this->assertEquals('setMessage', $ack->payload->POST->class_method);
    }

    /**
     * Create Application.
     *
     * @return mixed
     */
    public function createApplication()
    {
        require __DIR__.'/../core/4klift.php';
        $app['session.test'] = false;

        return $this->app = $app;
    }
}
