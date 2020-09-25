<?php

namespace Tests;

class AverageWordLengthTest extends BaseTest
{
    public function positiveDataProvider()
    {
        return [
            ['Hey my name is Dima', 3],
            ['sort several arrays at once', 4],
            ['Flush system output buffer', 5],
            ['Flush system output buffer', 5],
            ['The manual is a little shy on explaining that output buffers are nested', 4],
        ];
    }

    /**
     * @param $string
     * @param $expected
     *
     * @dataProvider positiveDataProvider
     */
    public function testPositive($string, $expected)
    {
        $result = $this->textAnalyzer->getAverageWordLength($string);
        $this->assertEquals($expected, $result);
    }
}
