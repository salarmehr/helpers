<?php

require __DIR__ . '/../src/dev.php';

class DevTest extends PHPUnit\Framework\TestCase
{


    public function testEchoLn()
    {
        $this->expectOutputString("book" ."\n");

        f\dev::echoLn('book');
    }
	


}	