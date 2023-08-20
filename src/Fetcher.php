<?php

namespace JPCaparas\Randopedia;

use JPCaparas\Randopedia\Entities\Article;
use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use JPCaparas\Randopedia\Entities\ContentUrls;
use JPCaparas\Randopedia\Entities\Image;
use JPCaparas\Randopedia\Entities\NamespaceEntity;
use JPCaparas\Randopedia\Entities\Titles;

class Fetcher
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://en.wikipedia.org/api/rest_v1/']);
    }

    public function setClient(Client $client)
    {
        $this->client = $client;
    }
    public function fetchRandomArticles(int $limit = 5, array $blacklist = []): array
    {
        $articles = [];
        $retryCount = 0;
        $maxRetries = 10 * $limit; // Arbitrary retry limit to avoid infinite loops


        $requests = function ($total) {
            for ($i = 0; $i < $total; $i++) {
                yield new Request('GET', 'page/random/summary');
            }
        };

        while (count($articles) < $limit && $retryCount < $maxRetries) {
            $pool = new Pool($this->client, $requests($limit), [
                'concurrency' => 5,
                'fulfilled' => function ($response) use (&$articles, $blacklist) {
                    $data = json_decode($response->getBody(), true);

                    $article = new Article(
                        $data['type'],
                        $data['title'],
                        $data['displaytitle'],
                        new NamespaceEntity($data['namespace']['id'], $data['namespace']['text']),
                        $data['wikibase_item'],
                        new Titles($data['titles']['canonical'], $data['titles']['normalized'], $data['titles']['display']),
                        $data['pageid'],
                        new Image($data['thumbnail']['source'], $data['thumbnail']['width'], $data['thumbnail']['height']),
                        new Image($data['originalimage']['source'], $data['originalimage']['width'], $data['originalimage']['height']),
                        $data['lang'],
                        $data['dir'],
                        $data['revision'],
                        $data['tid'],
                        $data['timestamp'],
                        $data['description'],
                        $data['description_source'],
                        new ContentUrls($data['content_urls']['desktop'], $data['content_urls']['mobile']),
                        $data['extract'],
                        $data['extract_html'],
                    );

                    if (!$this->containsBlacklistedWords($article, $blacklist)) {
                        $articles[] = $article;
                    }
                }
            ]);

            $promise = $pool->promise();
            $promise->wait();
        }

        return $articles;
    }

    private function containsBlacklistedWords(Article $article, array $blacklist = []): bool
    {
        foreach ($blacklist as $word) {
            if (stripos($article->getTitle(), $word) !== false || stripos($article->getDescription(), $word) !== false) {
                return true;
            }
        }
        return false;
    }
}
