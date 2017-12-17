<?php

require __DIR__ . '/../src/arr.php';

class ArrTest extends PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider unionProvider
     */
	public function testUnion($arr1 , $arr2 , $expexted)
	{

		$this->assertEquals($expexted , f\arr::union($arr1,$arr2));
	}


	public function unionProvider(){

		return [
			[['1'] , ['2'] , ['1' , '2']],
			[['a' , 'b'] , ['c' , 'd'] , ['a' , 'b' , 'c' , 'd']]
		];
	}

}


