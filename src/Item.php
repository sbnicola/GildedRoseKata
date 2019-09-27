<?php

namespace App;

final class Item {

    public $name;
    public $sell_in;
    public $quality;
    public const MAX_QUALITY = 50;

    function __construct($name, $sell_in, $quality) {
        $this->name    = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function isSellDatePassed() {
        if ($this->sell_in <= 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isQualityZero() {
        if ($this->quality <= 0) {
            $this->quality = 0;
        }
    }

    public function decreaseSellIn() {
        if ($this->sell_in > 0) {
            $this->sell_in -= 1;
        }
    }
}

