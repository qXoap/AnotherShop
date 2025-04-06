<?php

namespace xoapp\shop\object;

use pocketmine\item\Item;
use xoapp\shop\library\serializer\ItemSerializer;

class Element
{
    public function __construct(
        private readonly string $uuid,
        private readonly Item $item,
        private int $price,
    )
    {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getItem(): Item
    {
        return clone $this->item;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid,
            'baseItem' => ItemSerializer::itemToString($this->item),
            'price' => $this->price
        ];
    }
}