<?php

namespace JPCaparas\Randopedia\Entities;

class Titles
{
    private string $canonical;
    private string $normalized;
    private string $display;

    public function __construct(string $canonical, string $normalized, string $display)
    {
        $this->canonical = $canonical;
        $this->normalized = $normalized;
        $this->display = $display;
    }

    public function getCanonical(): string
    {
        return $this->canonical;
    }

    public function getNormalized(): string
    {
        return $this->normalized;
    }

    public function getDisplay(): string
    {
        return $this->display;
    }
}
