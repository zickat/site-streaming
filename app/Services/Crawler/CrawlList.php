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
    public function __construct($pageLink, $linkDom = '', $nextDom = '')
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

    public function getNext(){
        $nodes = $this->request->filter($this->nextDom)->children()->filter('a, .current-item')->each(function ($node){
            return $node->getAttribute('href');
        });
        $isNext = false;
        foreach ($nodes as $node){
            if($isNext){
                return $node;
            }
            if($node == ""){
                $isNext = true;
            }
        }
        return null;
    }

}