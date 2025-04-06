<?php

namespace xoapp\shop\object;

class SubCategory
{
    public function __construct(
        private readonly string $name,
        private array $elements = []
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getElements(): array
    {
        return $this->elements;
    }

    public function addElement(Element $element): void
    {
        $this->elements[$element->getUuid()] = $element;
    }

    public function deleteElement(string $uuid): void
    {
        unset($this->elements[$uuid]);
    }

    public function getElement(string $uuid): ?Element
    {
        return $this->elements[$uuid] ?? null;
    }

    public function toArray(): array
    {
        return array_map(fn (Element $element) => $element->toArray(), $this->elements);
    }
}