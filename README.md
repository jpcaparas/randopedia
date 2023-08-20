# Randopedia

Randopedia is a simple PHP library that fetches random articles from Wikipedia using their REST API.

## Features

- Fetch multiple random articles in parallel.
- Blacklist mechanism to avoid fetching articles based on specific keywords.
- Integration with Wikipedia's REST API.

## Installation

```bash
composer require jpcaparas/randopedia
```

## Usage

```php
use JPCaparas\Randopedia\Fetcher;

$fetcher = new Fetcher();
$articles = $fetcher->fetchRandomArticles(5, ['exclude_keyword1', 'exclude_keyword2']);
```
## Tests

### Running Integration Tests

Integration tests will hit the live Wikipedia API. To run the integration tests:

```bash
vendor/bin/phpunit --testsuite Integration
```

Please note: Running integration tests frequently may hit rate limits.
