<?php

namespace f\test;

require __DIR__ . '/../src/str.php';

class Test extends \PHPUnit\Framework\TestCase
{
  function decamelizeProvider()
  {
    return [
      ['', ''],
      ['sample', 'sample'],
      ['Sample', 'Sample'],
      ['sampleStr', 'sample Str'],
      ['SampleStr', 'Sample Str'],
      ['SomeIDWithNumb3rs', 'Some ID With Numb3rs'],
      ['SomeID4Test', 'Some ID4Test'],
      ['AbcPvtLtd', 'Abc Pvt Ltd'],
      ['ABC', 'ABC'],
    ];
  }

  /**
   * @dataProvider decamelizeProvider
   */
  function testDecamelize($string, $expected)
  {
    $this->assertEquals($expected, \f\str::decamlize($string));
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
