<?php

namespace xoapp\shop\object;

use pocketmine\item\Item;
use xoapp\shop\library\serializer\ItemSerializer;

class Category
{
    public function __construct(
        private readonly string $name,
        private array $subCategories = [],
        private array $elements = [],
        private ?Item $menuItem = null,
        private ?int $menuSlot = null
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSubCategories(): array
    {
        return $this->subCategories;
    }

    public function getElements(): array
    {
        return $this->elements;
    }

    public function getMenuItem(): ?Item
    {
        return $this->menuItem;
    }

    public function getMenuSlot(): ?int
    {
        return $this->menuSlot;
    }

    public function addSubCategory(SubCategory $category): void
    {
        $this->subCategories[$category->getName()] = $category;
    }

    public function deleteSubCategory(string $name): void
    {
        unset($this->subCategories[$name]);
    }

    public function getSubCategory(string $name): ?SubCategory
    {
        return $this->subCategories[$name] ?? null;
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

    public function setMenuItem(?Item $menuItem = null): void
    {
        $this->menuItem = $menuItem;
    }

    public function setMenuSlot(?int $slot = null): void
    {
        $this->menuSlot = $slot;
    }

    public function toArray(): array
    {
        return [
            'menuItem' => ItemSerializer::itemToString($this->menuItem),
            'menuSlot' => $this->menuSlot,
            'subCategories' => array_map(fn (SubCategory $subCategory) => $subCategory->toArray(), $this->subCategories),
            'elements' => array_map(fn (Element $element) => $element->toArray(), $this->elements)
        ];
    }
}