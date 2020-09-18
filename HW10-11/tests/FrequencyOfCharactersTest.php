<?php

namespace Tests;

class FrequencyOfCharactersTest extends BaseTest
{
    public function positiveDataProvider()
    {
        return [
            [
                'Dymytrii',
                [
                    'D' => 1,
                    'y' => 2,
                    'm' => 1,
                    't' => 1,
                    'r' => 1,
                    'i' => 2,
                ]
            ],
            [
                'PHP',
                [
                    'P' => 2,
                    'H' => 1,
                ]
            ],
            [
                'Ноутбук',
                [
                    'Н' => 1,
                    'о' => 1,
                    'у' => 2,
                    'т' => 1,
                    'б' => 1,
                    'к' => 1,
                ]
            ],
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
        $result = $this->textAnalyzer->getFrequencyOfCharacters($string);
        $this->assertEquals($expected, $result);
    }
}
