<?php

namespace App;

class GildedRoseTest extends \PHPUnit\Framework\TestCase {
    public function testFoo() {
        $items      = [new Item("foo", 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("foo", $items[0]->name);
    }

    //name,sellin,quality

    public function testAgedBrie() {
        $items      = [new Item("Aged Brie", 1, 2)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(3,$items[0]->quality);
        $this->assertEquals(0,$items[0]->sell_in);
    }

    public function testAgedBrieMaxQuality() {
        $items      = [new Item("Aged Brie", 10, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(50,$items[0]->quality);
        $this->assertEquals(9,$items[0]->sell_in);

    }

    public function testSulfuras() {
        $items      = [new Item("Sulfuras, Hand of Ragnaros", 1, 80)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("Sulfuras, Hand of Ragnaros", $items[0]->name);
        $this->assertEquals(80,$items[0]->quality);
        $this->assertEquals(null ,$items[0]->sell_in);
    }


    public function testCommonItem () {
        $items      = [new Item("random item", 4, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(49,$items[0]->quality);
        $this->assertEquals(3,$items[0]->sell_in);
    }

    public function testCommonItemPastSellDate () {
        $items      = [new Item("random item", 0, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(48,$items[0]->quality);
        $this->assertEquals(0,$items[0]->sell_in);
    }

    public function testCommonItemQualityLessThanZero() {
        $items      = [new Item("random item", 0, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0,$items[0]->quality);
        $this->assertEquals(0,$items[0]->sell_in);
    }
    public function testBackstageWithTenDaysLeft () {
        $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 10, 48)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(50,$items[0]->quality);
        $this->assertEquals(9,$items[0]->sell_in);
    }

    public function testBackstageWithFiveDaysLeft () {

        $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 5, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(43,$items[0]->quality);
        $this->assertEquals(4,$items[0]->sell_in);
    }

    public function testBackstageWithZeroDaysLeft () {
        $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 0, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0,$items[0]->quality);
        $this->assertEquals(0,$items[0]->sell_in);
    }

    public function testConjuredItem () {
        $items      = [new Item("conjured item", 5, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(38,$items[0]->quality);
        $this->assertEquals(4,$items[0]->sell_in);
    }

    public function testConjuredItemPastSellDate () {
        $items      = [new Item("Conjured", 0, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(36,$items[0]->quality);
        $this->assertEquals(0,$items[0]->sell_in);
    }
}
