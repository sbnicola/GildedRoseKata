<?php

namespace App;

class AgedBrieService {

    public function updateQuality($item) {
        if ($item->quality < Item::MAX_QUALITY) {
            $item->quality += 1;
        }

        $item->decreaseSellIn();
    }
}