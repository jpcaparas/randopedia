<?php

namespace JPCaparas\Randopedia\Entities;

class Article
{
    private $type;
    private $title;
    private $displayTitle;
    private $namespace;
    private $wikibaseItem;
    private $titles;
    private $pageId;
    private $thumbnail;
    private $originalImage;
    private $lang;
    private $dir;
    private $revision;
    private $tid;
    private $timestamp;
    private $description;
    private $descriptionSource;
    private $contentUrls;
    private $extract;
    private $extractHtml;

    public function __construct(
        string $type,
        string $title,
        string $displayTitle,
        NamespaceEntity $namespace,
        string $wikibaseItem,
        Titles $titles,
        int $pageId,
        Image $thumbnail,
        Image $originalImage,
        string $lang,
        string $dir,
        string $revision,
        string $tid,
        string $timestamp,
        string $description,
        string $descriptionSource,
        ContentUrls $contentUrls,
        string $extract,
        string $extractHtml
    ) {
        $this->type = $type;
        $this->title = $title;
        $this->displayTitle = $displayTitle;
        $this->namespace = $namespace;
        $this->wikibaseItem = $wikibaseItem;
        $this->titles = $titles;
        $this->pageId = $pageId;
        $this->thumbnail = $thumbnail;
        $this->originalImage = $originalImage;
        $this->lang = $lang;
        $this->dir = $dir;
        $this->revision = $revision;
        $this->tid = $tid;
        $this->timestamp = $timestamp;
        $this->description = $description;
        $this->descriptionSource = $descriptionSource;
        $this->contentUrls = $contentUrls;
        $this->extract = $extract;
        $this->extractHtml = $extractHtml;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDisplayTitle(): string
    {
        return $this->displayTitle;
    }

    public function getNamespace(): NamespaceEntity
    {
        return $this->namespace;
    }

    public function getWikibaseItem(): string
    {
        return $this->wikibaseItem;
    }

    public function getTitles(): Titles
    {
        return $this->titles;
    }

    public function getPageId(): int
    {
        return $this->pageId;
    }

    public function getThumbnail(): Image
    {
        return $this->thumbnail;
    }

    public function getOriginalImage(): Image
    {
        return $this->originalImage;
    }

    public function getLang(): string
    {
        return $this->lang;
    }

    public function getDir(): string
    {
        return $this->dir;
    }

    public function getRevision(): string
    {
        return $this->revision;
    }

    public function getTid(): string
    {
        return $this->tid;
    }

    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDescriptionSource(): string
    {
        return $this->descriptionSource;
    }

    public function getContentUrls(): ContentUrls
    {
        return $this->contentUrls;
    }

    public function getExtract(): string
    {
        return $this->extract;
    }

    public function getExtractHtml(): string
    {
        return $this->extractHtml;
    }
}
