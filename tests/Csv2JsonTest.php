<?php

namespace JoshuaWebDev\Csv2Json;

use JoshuaWebDev\Csv2Json\Csv2Json;
use PHPUnit\Framework\TestCase as PHPUnit;

class Csv2JsonTest extends PHPUnit
{
    /**
     * @test
     * @return void
     */
    public function shouldBeInstanceOfClass(): void
    {
        $csv2json = new Csv2Json;
        $this->assertEquals('JoshuaWebDev\Csv2Json\Csv2Json', get_class($csv2json));
    }

    /**
     * @test
     * @return void
     */
    public function shouldBePossibleSetTheSeparator(): void
    {
        $csv2json = new Csv2Json;
        $csv2json->setSeparator(",");
        $this->assertEquals(",", $csv2json->getSeparator());
    }
}
