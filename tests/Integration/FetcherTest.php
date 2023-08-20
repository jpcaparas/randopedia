<?php

namespace JPCaparas\Randopedia\Tests\Integration;

use JPCaparas\Randopedia\Fetcher;
use PHPUnit\Framework\TestCase;

class FetcherTest extends TestCase
{

    public function testFetchRandomArticlesCount(): void
    {
        $fetcher = new Fetcher();
        $articles = $fetcher->fetchRandomArticles(20);

        $this->assertCount(20, $articles, 'The number of articles do not match');
    }
}
