<?php

namespace xoapp\shop\factory;

use Closure;
use pocketmine\utils\Utils;
use xoapp\shop\data\DataCreator;
use xoapp\shop\object\Category;

class CategoryFactory
{

    /** @var Category[] */
    private static array $categories = [];

    private static DataCreator $dataCreator;

    public static function load(): void
    {
        self::$dataCreator = new DataCreator("shop");

        foreach (self::$dataCreator->getAll() as $key => $value) {

        }
    }

    public static function forEach(Closure $closure): void
    {
        Utils::validateCallableSignature(function (string $name, Category $category): void {}, $closure);

        foreach (self::$categories as $name => $category) {
            call_user_func($closure, $name, $category);
        }
    }

    public static function register(Category $category): void
    {
        self::$categories[$category->getName()] = $category;
    }

    public static function delete(string $name): void
    {
        if (!isset($categories[$name])) {
            return;
        }

        unset(self::$categories[$name]);
        self::$dataCreator->delete($name);
    }

    public static function get(string $name): ?Category
    {
        return self::$categories[$name] ?? null;
    }

    public static function save(): void
    {
        self::forEach(fn (string $name, Category $category) => self::$dataCreator->set($name, $category->toArray()));
    }
}