<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Lib\Connector;

use Codeception\Lib\Connector\ZendExpressive\ResponseCollector;
use Symfony\Component\BrowserKit\Client;
use Symfony\Component\BrowserKit\Request as BrowserKitRequest;
use Symfony\Component\BrowserKit\Response;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\UploadedFile;
use Zend\Expressive\Application;

class ZendExpressive extends Client
{

    /**
     * @var \Zend\Expressive\Application
     */
    protected $application;

    /**
     * @var \Codeception\Lib\Connector\ZendExpressive\ResponseCollector
     */
    protected $responseCollector;

    /**
     * @param \Zend\Expressive\Application
     *
     * @return void
     */
    public function setApplication(Application $application)
    {
        $this->application = $application;
    }

    /**
     * @param \Codeception\Lib\Connector\ZendExpressive\ResponseCollector $responseCollector
     *
     * @return void
     */
    public function setResponseCollector(ResponseCollector $responseCollector)
    {
        $this->responseCollector = $responseCollector;
    }

    /**
     * @param \Symfony\Component\BrowserKit\Request $request
     *
     * @return \Symfony\Component\BrowserKit\Response
     */
    public function doRequest($request)
    {
        $inputStream = fopen('php://memory', 'r+');
        $content = $request->getContent();
        if ($content !== null) {
            fwrite($inputStream, $content);
            rewind($inputStream);
        }

        $queryParams = [];
        $postParams = [];
        $queryString = parse_url($request->getUri(), PHP_URL_QUERY);
        if ($queryString != '') {
            parse_str($queryString, $queryParams);
        }
        if ($request->getMethod() !== 'GET') {
            $postParams = $request->getParameters();
        }

        $serverParams = $request->getServer();
        if (!isset($serverParams['SCRIPT_NAME'])) {
            //required by WhoopsErrorHandler
            $serverParams['SCRIPT_NAME'] = 'Codeception';
        }

        $zendRequest = new ServerRequest(
            $serverParams,
            $this->convertFiles($request->getFiles()),
            $request->getUri(),
            $request->getMethod(),
            $inputStream,
            $this->extractHeaders($request)
        );

        $zendRequest = $zendRequest->withCookieParams($request->getCookies())
            ->withQueryParams($queryParams)
            ->withParsedBody($postParams);

        $cwd = getcwd();
        chdir(codecept_root_dir());
        $this->application->run($zendRequest);
        chdir($cwd);

        $this->request = $zendRequest;

        $response = $this->responseCollector->getResponse();
        $this->responseCollector->clearResponse();

        return new Response(
            $response->getBody(),
            $response->getStatusCode(),
            $response->getHeaders()
        );
    }

    private function convertFiles(array $files)
    {
        $fileObjects = [];
        foreach ($files as $fieldName => $file) {
            if ($file instanceof UploadedFile) {
                $fileObjects[$fieldName] = $file;
            } elseif (!isset($file['tmp_name']) && !isset($file['name'])) {
                $fileObjects[$fieldName] = $this->convertFiles($file);
            } else {
                $fileObjects[$fieldName] = new UploadedFile(
                    $file['tmp_name'],
                    $file['size'],
                    $file['error'],
                    $file['name'],
                    $file['type']
                );
            }
        }
        return $fileObjects;
    }

    private function extractHeaders(BrowserKitRequest $request)
    {
        $headers = [];
        $server = $request->getServer();

        $contentHeaders = ['Content-Length' => true, 'Content-Md5' => true, 'Content-Type' => true];
        foreach ($server as $header => $val) {
            $header = implode('-', array_map('ucfirst', explode('-', strtolower(str_replace('_', '-', $header)))));

            if (strpos($header, 'Http-') === 0) {
                $headers[substr($header, 5)] = $val;
            } elseif (isset($contentHeaders[$header])) {
                $headers[$header] = $val;
            }
        }

        return $headers;
    }

}
