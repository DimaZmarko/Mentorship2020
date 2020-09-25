<?php

namespace Tests;

class TopTenLongestPalindromeWordsTest extends BaseTest
{
	public function positiveDataProvider()
	{
		return [
			[
				ENG_TEXT,
				[
					'Malayalam',
					'deified',
					'repaper',
					'reviver',
					'stats',
					'level',
					'kayak',
					'minim',
					'boob',
					'esse',
				],
			],
			[
				UKR_TEXT,
				[
					'зараз',
					'Тут',
				],
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
		$result = $this->textAnalyzer->getPalindromeWords($string);
		$this->assertEquals($expected, $result);
	}
}
