<?php

class NumTest extends PHPUnit\Framework\TestCase
{
	/**
    * @dataProvider toRomanicProvider
    */
    public function testToRomanic($original,$expected)
    {
        $this->assertEquals($expected, f\num::toRomanic($original));
    }

    public function toRomanicProvider()
    {
        return [
            [5632   , 'MMMMMDCXXXII'],
            [405    , 'CDV'],
            [15     , "XV"],
            [7       ,'VII']
        ];
    }


    /**
    * @dataProvider toWesternProvider
    */
    public function testToWestern($original,$expected)
    {
        $this->assertEquals($expected, f\num::toWestern($original));
    }

    public function toWesternProvider()
    {
        return [
            ['۰۹۸۰'   , '0980'],
            ['۳ year'   , '3 year']
        ];
    }



    /**
    * @dataProvider toEasternProvider
    */
    public function testToEastern($original,$expected)
    {
        $this->assertEquals($expected, f\num::toEastern($original));
    }

    public function toEasternProvider()
    {
        return [
            ['0980'   , '۰۹۸۰'],
            ['3 سال'   , '۳ سال']
        ];
    }



	/**
    * @dataProvider toArabicProvider
    */
    public function testToArabic($original,$expected)
    {
        $this->assertEquals($expected, f\num::toArabic($original));
    }

    public function toArabicProvider()
    {
        return [
            ['MMMMMDCXXXII' ,5632],
            ['CDV'          ,405 ],
            ["XV"           ,15  ],
            ['VII'          ,7   ]
        ];
    }
}
