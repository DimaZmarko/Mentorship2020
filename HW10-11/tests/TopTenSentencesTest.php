<?php

namespace Tests;

class TopTenSentencesTest extends BaseTest
{
    public function positiveDataProvider()
    {
        return [
            [
                ENG_TEXT,
                [
                    'At consectetur lorem donec massa',
                    'Ornare arcu dui vivamus arcu',
                    'Non quam lacus suspendisse faucibus',
                    'Eu sem integer vitae justo eget',
                    'At varius vel pharetra vel turpis',
                    'Curabitur gravida arcu ac tortor dignissim convallis',
                    'Massa eget egestas purus viverra accumsan in',
                    'Sit amet justo donec enim diam vulputate',
                    'Sit amet commodo nulla facilisi nullam vehicula',
                    'Cursus vitae congue mauris rhoncus aenean vel',
                ]
            ],
            [
                UKR_TEXT,
                [
                    'Тобто у самому процесі синтезу',
                    'І ми їх мусимо синтезувати самі',
                    'Для якісного буття необхідний налагоджений реченнєвий обмін',
                    'Буття присутнє тільки у синтезованих, сформульованих реченнях',
                    'Щастя буття залежить тільки від інтенсивності синтезу',
                    'Ми ж їх можемо розщеплювати, перетворюючи у ріст',
                    'Речення роблять із світу буття, яке і є щастям',
                    'Справа не у вагомості думки, не у мальовничості образів',
                    'Маючи доступ до атомів-слів, ми можемо поглинати світ у вигляді сполук-речень',
                    'Тобто не від кількості, а від неперервності процесу структурування мови, в якій проживаємо життя',
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
        $result = $this->textAnalyzer->getLongestSentences($string);
        $this->assertEquals($expected, $result);
    }
}
