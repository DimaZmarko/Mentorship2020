<?php

namespace Tests;

const ENG_TEXT = 'Lorem ipsum dolor stats sit deified amet. Malayalam consectetur';
const UKR_TEXT = 'Тут зараз може бути багато тексту але його не буде.';

class NumberOfPalindromeWordsTest extends BaseTest
{
	public function positiveDataProvider()
	{
		return [
			[
				ENG_TEXT,
				3,
			],
			[
				UKR_TEXT,
				2,
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
		$result = $this->textAnalyzer->getPalindromeWordsCount($string);
		$this->assertEquals($expected, $result);
	}
}
