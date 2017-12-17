<?php

require __DIR__ . '/../src/tmp.php';

class TmpTest extends PHPUnit\Framework\TestCase
{



	/**
	* @dataProvider elapsedProvider
	*/
    public function testElapsed($time , $date , $expected)
    {
        $this->assertEquals($expected. ' seconds' , f\tmp::elapsed($time , $date));
    }

    public function elapsedProvider()
    {
        return [
			
			[           0   ,  true  ,  time()-0          ],
			[       86400   ,  false ,  86400             ],
			[  1212345678   ,  true  ,  time()-1212345678 ]
        ];
    }



}