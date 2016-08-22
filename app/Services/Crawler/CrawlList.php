<?php

namespace App\Services\Crawler;


use Goutte\Client;

abstract class CrawlList
{

    protected $pageLink;

    private $linkDom;

    private $nextDom;

    private $client;

    private $request;

    private static $baseUrl = 'http://www.allocine.fr';

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
        $url = self::$baseUrl.$this->pageLink;
        $this->request = $this->client->request('GET', $url);
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

    public abstract function execute();

}