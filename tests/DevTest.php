<?php

require __DIR__ . '/../src/dev.php';

class DevTest extends PHPUnit\Framework\TestCase
{


  public function testEchoLn()
  {
    f\dev::echoLn('book');
    $this->expectOutputString('book'.PHP_EOL);
  }

  /**
   * @dataProvider existsProvider
   */
  public function testExists($value, $expected)
  {
    $actual = \f\dev::exists($value);
    $this->assertEquals($expected, $actual);
  }

  public function existsProvider()
  {
    return [
      [0, true],
      [true, true],
      [null, false],
      ['', false],
      [[], false],
      [false, false],
    ];
  }

}	