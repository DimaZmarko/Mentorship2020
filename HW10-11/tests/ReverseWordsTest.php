<?php

namespace Tests;

class ReverseWordsTest extends BaseTest
{
    public function positiveDataProvider()
    {
        return [
            ['This is the text', 'text the is This'],
            ['довільнй текст', 'текст довільний']
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
        $result = $this->textAnalyzer->getReversedWords($string);
        $this->assertEquals($expected, $result);
    }
}
