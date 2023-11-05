<?php

namespace JoshuaWebDev\Csv2Json;

use JoshuaWebDev\Csv2Json\Csv2Json;
use JoshuaWebDev\Csv2Json\TestCase;

    class Csv2JsonTest extends TestCase
{
    private $csv2json;

    /**
    * @return void
    */
    protected function setUp(): void
    {
        $this->csv2json = new Csv2Json();
        parent::setUp();
    }

    /**
     * @test
     * @return void
     */
    public function shouldBeInstanceOfClass(): void
    {
        $this->assertEquals('JoshuaWebDev\Csv2Json\Csv2Json', get_class($this->csv2json));
    }

    /**
     * @test
     * @return void
     */
    public function shouldBePossibleSetTheSeparator(): void
    {
        $this->csv2json->setSeparator(",");
        $this->assertEquals(",", $this->csv2json->getSeparator());
    }
}
