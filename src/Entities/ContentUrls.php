<?php

namespace JPCaparas\Randopedia\Entities;

class ContentUrls
{
    private array $desktop;

    private array $mobile;

    public function __construct(array $desktop, array $mobile)
    {
        $this->desktop = $desktop;
        $this->mobile = $mobile;
    }

    public function getDesktop(): array
    {
        return $this->desktop;
    }

    public function getMobile(): array
    {
        return $this->mobile;
    }
}
