<?php

namespace App;

class ConjuredService {

    public function updateQuality($item) {       
        if ($item->isSellDatePassed($item)){
            $item->quality -= 4;
        } else {
            $item->quality -= 2;
        }
        $item->isQualityZero();
        $item->decreaseSellIn();
    }
}