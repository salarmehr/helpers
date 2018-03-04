<?php

require __DIR__ . '/../src/str.php';

class StrTest extends PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider decamelizeProvider
     */

    function testDecamelize($orginal , $expected )
    {
        $this->assertEquals($expected, f\str::decamlize($orginal));
    }

    public function decamelizeProvider()
    {
        return [
          [ 'sample' , 'Sample' ],
          [ 'sampleStr' , 'Sample Str' ],
          [ 'someIDWithNumb3rs' , 'Some ID With Numb3rs' ],
          [ 'some ID 4Test' , 'Some ID 4 Test' ],
          [ 'abcPvtLtd' , 'Abc Pvt Ltd' ],
          [ 'abcPvtLtd' , 'Abc Pvt Ltd' ],
          [ 'ABC' , 'ABC' ]
        ];
    }


    /**
     * @dataProvider zwjRemoverProvider
     */
    public function testZwjRemover($original , $expected)
    {
        $this->assertEquals($expected, f\str::zwjRemover($original));
    }

    public function zwjRemoverProvider()
    {
        return [
            ["مهدي" , "مهدی"],
            ["كبیر" , "کبیر"],
            ["    میانگین    ,        كافي  ۷۰% مي باشد;     " , "میانگین ، کافی ۷۰٪ می باشد؛"]
        ];
    }

        /**
     * @dataProvider normalizeProvider
     */
    public function testNormalize($original , $expected)
    {
        $this->assertEquals($expected, f\str::normalize($original));
    }

    public function normalizeProvider()
    {
        return [
            ['x*[x+(x+y)*(w*z)]+1'     , 'x* [x+ (x+y) * (w*z) ] +1'],
            ['in the name of“God”'     , 'in the name of “God” '],
            ['«one»«two»«three»«four»' , ' «one» «two» «three» «four» ']
        ];
    }


    /**
    * @dataProvider fullTrimProvider
    */
    public function testFullTrim($original , $expected)
    {
        $this->assertEquals($expected, f\str::fullTrim($original));

    }


    public function fullTrimProvider()
    {
        return [
            ['    in the name of God'                 , 'in the name of God'],
            ['in the name of God      '               , 'in the name of God'],
            ['          in the     name of God      ' , 'in the     name of God']
        ];
    }


    /**
    * @dataProvider tailTrimProvider
    */
    public function testTailTrim($original , $expected)
    {
        $this->assertEquals($expected, f\str::tailTrim($original));

    }


    public function tailTrimProvider()
    {
        return [
            ['    in the name of God       ' , '    in the name of God'],
            ['in      the name of God      ' , 'in      the name of God'],
            ['    in  the name of God      ' , '    in  the name of God']
        ];
    }




    /**
    * @dataProvider headTrimProvider
    */
    public function testHeadTrim($original , $expected)
    {
        $this->assertEquals($expected, f\str::headTrim($original));

    }


    public function headTrimProvider()
    {
        return [
            ['    in the name of God       ' , 'in the name of God       '],
            ['      in      the name of God' , 'in      the name of God'],
            ['    in  the name of God      ' , 'in  the name of God      ']
        ];
    }





    /**
    * @dataProvider ellipsisProvider
    */
    public function testEllipsis($original , $expected)
    {
        $this->assertEquals($expected, f\str::ellipsis($original,30));

    }


    public function ellipsisProvider()
    {
        return [
            ['in the name of God.'              , 'in the name of God.'],
            ['But I must explain to you how.'   ,    'But I must explain to you how.'],
            [ 'But I must explain to you how all this.'   ,    'But I must explain to you how …']
        ];
    }





       public function testRandom()
    {
        $rand1 = f\str::random(15);
        $rand2 = f\str::random(15);
    
        $this->assertNotEquals($rand1, $rand2);

    }





    /**
    * @dataProvider isEmailProvider
    */
    public function testIsEmail($original , $expected)
    {
        $this->assertEquals($expected, f\str::isEmail($original,'Not True!!!'));

    }


    public function isEmailProvider()
    {
        return [
            [ 'example@domain.com', 'example@domain.com' ],
            ['@domain.com'        , 'Not True!!!'],
            ['example@domain.'    , 'Not True!!!'],
            ['example@domain.a'   , 'example@domain.a']
        ];
    }

}
