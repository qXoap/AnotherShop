<?php

namespace xoapp\shop\menu;

use dktapps\pmforms\MenuForm;
use dktapps\pmforms\MenuOption;
use pocketmine\player\Player;
use xoapp\shop\factory\CategoryFactory;
use xoapp\shop\object\Category;

class FormsManager
{
    public static function sendMainMenu(Player $player): void
    {
        $categoriesButtons = [];
        CategoryFactory::forEach(fn (string $name, Category $category) => array_push($categoriesButtons, new MenuOption($name)));

//        $form = new MenuForm(
//            "Categories", "", $categoriesButtons,
//            function (int $index)
//        );
    }
}