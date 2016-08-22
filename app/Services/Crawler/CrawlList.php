<?php

namespace App\Services\Crawler;


use Goutte\Client;

class CrawlList
{

    private $pageLink;

    private $linkDom;

    private $nextDom;

    private $client;

    private $request;

    /**
     * CrawlList constructor.
     * @param $pageLink
     * @param $linkDom
     * @param $nextDom
     */
    public function __construct($pageLink, $linkDom, $nextDom)
    {
        $this->pageLink = $pageLink;
        $this->linkDom = $linkDom;
        $this->nextDom = $nextDom;
        $this->client = new Client();
        $this->request = $this->client->request('GET', $this->pageLink);
    }

    public function getLinks(){
        return $this->request->filter($this->linkDom)->each(function($node) {
            return $node->getAttribute('href');
        });
    }

}