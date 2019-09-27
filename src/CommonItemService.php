<?php

namespace App;

class CommonItemService {

    public function updateQuality($item) {       
        if ($item->isSellDatePassed($item)){
            $item->quality -= 2;
        } else {
            $item->quality -= 1;
        }

        $item->isQualityZero();
        $item->decreaseSellIn();
    }
}