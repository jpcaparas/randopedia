<?php

namespace JPCaparas\Randopedia\Entities;

class Image
{
    private string $source;
    private int $width;
    private int $height;

    public function __construct(string $source, int $width, int $height)
    {
        $this->source = $source;
        $this->width = $width;
        $this->height = $height;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }
}
