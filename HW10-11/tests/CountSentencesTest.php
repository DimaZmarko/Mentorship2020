<?php

namespace Tests;

class CountSentencesTest extends BaseTest
{
    public function positiveDataProvider()
    {
        return [
            ['Turn on output buffering. Turn implicit flush on/off.', 2],
            ['The value can be of any type. The key can either be an integer a string. Indexed arrays without key', 3],
            ['Сьогодні сонце. Сьогодні сонячна погода', 2]
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
        $result = $this->textAnalyzer->getNumberOfSentences($string);
        $this->assertEquals($expected, $result);
    }
}
