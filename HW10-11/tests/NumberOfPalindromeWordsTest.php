<?php

namespace Tests;

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
