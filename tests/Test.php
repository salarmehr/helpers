<?php

require __DIR__ . '/../src/str.php';

class Test extends PHPUnit\Framework\TestCase
{
  function testDecamelize()
  {
    $testData = [
      ''                  => '',
      'sample'            => 'Sample',
      'Sample'            => 'Sample',
      'sampleStr'         => 'sample Str',
      'SampleStr'         => 'Sample Str',
      'SomeIDWithNumb3rs' => 'Some ID With Numb3rs',
      'SomeID4Test'       => 'Some ID 4Test',
      'ABCPvtLtd'         => 'ABC PvtLtd',
      'ABC'               => 'ABC',
    ];
    foreach ($testData as $input => $output) {
      $this->assertEquals($output, f\str::decamlize($input));
    }
  }
}
