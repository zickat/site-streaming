<?php
/**
 * Created by PhpStorm.
 * User: valen
 * Date: 22/08/2016
 * Time: 17:57
 */

namespace App\Services\Crawler;


use App\Jobs\ListFilmCrawlerQueue;

class CrawlFilmList extends CrawlList
{

    const LINK_DOM = 'a.meta-title-link';

    const NEXT_DOM = '.pagination-item-holder';

    /**
     * CrawlFilmList constructor.
     * @param $url
     */
    public function __construct($url)
    {
        parent::__construct($url, self::LINK_DOM, self::NEXT_DOM);
    }

    public function execute(){
        $links = $this->getLinks();
        foreach ($links as $link){
            //Dispatch les films
        }
        $next = $this->getNext();
        if($next)
            dispatch(new ListFilmCrawlerQueue($next));
    }

}