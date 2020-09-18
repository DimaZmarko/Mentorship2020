<?php

namespace Tests;

class NumberOfWordsTest extends BaseTest
{
    public function positiveDataProvider()
    {
        return [
            ['Turn on output buffering. Turn implicit flush on/off.', 8],
            ['The value can be of any type. The key can either be an integer a string. Indexed arrays without key', 20],
            ['Всім привіт. Мене звати Димитрій', 5]
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
        $result = $this->textAnalyzer->getNumberOfWords($string);
        $this->assertEquals($expected, $result);
    }
}
