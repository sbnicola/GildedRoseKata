<?php

namespace App;

use App\ItemController;

final class GildedRose {

    private $items = [];

    public function __construct($items) {
        $this->items = $items;
    }

    public function updateQuality() {

        $itemController = new ItemController();

        foreach ($this->items as $item) {
            $itemController->update($item);
        }
    }
}