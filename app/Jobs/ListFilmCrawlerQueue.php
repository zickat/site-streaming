<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Services\Crawler\CrawlFilmList;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class ListFilmCrawlerQueue extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $url;

    /**
     * Create a new job instance.
     *
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $crawler = new CrawlFilmList($this->url);
        $crawler->execute();
        Log::info($crawler->getLinks());
        Log::info($crawler->getNext());
    }

}
