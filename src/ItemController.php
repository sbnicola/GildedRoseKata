<?php

namespace App;

use App\AgedBrieService;
use App\ConjuredService;
use App\SulfurasService;
use App\CommonItemService;
use App\BackstagePassService;

class ItemController {

    CONST MAX_QUALITY = 50;
    
    public function update($item) {

        $agedBrie = new AgedBrieService();
        $backstagePass = new BackstagePassService();
        $sulfuras = new SulfurasService();
        $commonItem = new CommonItemService();
        $conjured = new ConjuredService();


        switch ($item->name):
                case 'Aged Brie':

                    $agedBrie->updateQuality($item);

                    break;

                case 'Backstage passes to a TAFKAL80ETC concert':

                    $backstagePass->updateQuality($item);
                    
                    break;

                case 'Sulfuras, Hand of Ragnaros':

                    $sulfuras->updateQuality($item);

                    break;

                default:
                    if (stristr($item->name,'conjured') !== false){
                        $conjured->updateQuality($item);
                    }
                    else {
                    $commonItem->updateQuality($item);
                    }

            endswitch;
    }

}

