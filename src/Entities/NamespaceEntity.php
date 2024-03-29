<?php

namespace JPCaparas\Randopedia\Entities;

class NamespaceEntity
{
    private int $id;
    private string $text;

    public function __construct(int $id, string $text)
    {
        $this->id = $id;
        $this->text = $text;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
