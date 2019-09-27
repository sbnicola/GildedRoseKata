<?php

namespace App;

class BackstagePassService {

    public function updateQuality($item) {
        
        if ($item->quality + 1 < Item::MAX_QUALITY) {

            $item->quality += 1;

            if ($item->sell_in <= 10) {
                $item->quality += 1;
            }

            if ($item->sell_in <= 5) {
                $item->quality += 1;
            }

            if ($item->sell_in <= 0) {
                $item->quality = 0;
            }
        }

        else {
            $item->quality = 50;
        }

        $item->decreaseSellIn();
    }
}