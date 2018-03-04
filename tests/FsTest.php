<?php

require __DIR__ . '/../src/fs.php';

class FsTest extends PHPUnit\Framework\TestCase
{


	/**
    * @dataProvider fileSizeProvider
    */
    public function testFileSize($original, $expected)
    {
        $this->assertEquals($expected,f\fs::fileSize($original));
    }

    public function fileSizeProvider()
    {
        return [
        	[0             ,    0                                                   ],
            [1             ,    '1 B'                                               ],
            [1023          ,    '1023 B'                                            ],
            [1048575       ,    number_format(1048575 / 1024, 2) . ' KB'            ],
            [1073741823    ,    number_format(1073741823 / 1048576, 2) . ' MB'      ],
            [10073741824   ,    number_format(10073741824 / 1073741824, 2) . ' GB'  ]

        ];
    }



}

    