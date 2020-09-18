<?php

namespace Tests;

class CountNumsTest extends BaseTest
{
    public function positiveDataProvider()
    {
        return [
            [
                ENG_TEXT,
                [
                    'At',
                    'ac',
                    'eu',
                    'id',
                    'in',
                    'mi',
                    'ut',
                    'How',
                    'Non',
                    'Sed',
                ]
            ],
            [
                UKR_TEXT,
                [
                    'І',
                    'а',
                    'в',
                    'х',
                    'х',
                    'до',
                    'ми',
                    'не',
                    'як',
                    'із',
                ]
            ],
        ];
    }

    /**
     * @param string $string
     * @param $expected
     *
     * @dataProvider positiveDataProvider
     */
    public function testPositive($string, $expected)
    {
        $result = $this->textAnalyzer->getLongestWords($string);
        $this->assertEquals($expected, $result);
    }
}
