<?php

namespace Tests;

class AverageNumberOfWordsInSentenceTest extends BaseTest
{
    /**
     * @return array
     */
    public function positiveDataProvider()
    {
        return [
            ['Turn on output buffering. Turn implicit flush on/off.', 4],
            ['The value can be of any type. The key can either be an integer a string. Indexed arrays without key', 6],
            ['Мама мила раму. Мама мила', 2],
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
        $result = $this->textAnalyzer->getAverageNumberWordsInSentence($string);
        $this->assertEquals($expected, $result);
    }
}
