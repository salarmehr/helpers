<?php

require __DIR__ . '/../src/str.php';

class Test extends PHPUnit\Framework\TestCase
{
  function testDecamelize()
  {
    $testData = [
      ''                  => '',
      'sample'            => 'Sample',
      'sampleStr'         => 'Sample Str',
      'someIDWithNumb3rs' => 'Some ID With Numb3rs',
      'some ID 4Test'     => 'Some ID 4 Test',
      'ABC pvtLtd'         => 'ABC Pvt Ltd',
      'ABC'               => 'ABC',
    ];
    foreach ($testData as $input => $output) {
      $this->assertEquals($output, f\str::decamlize($input));

      var_dump($input);
      var_dump($output);
    }
  }

  function testToEastern(){
    $testData = [
      'مهدی1' => 'مهدی۱',
      '1−علی' => '۱−علی',
      '2−احسان' => '۲−احسان',
      '3−مهدی' => '۳−مهدی',
    ];
  

    foreach ($testData as $input => $output) {
      $this->assertEquals($output, f\num::toEastern($input));
    }

  }
}
