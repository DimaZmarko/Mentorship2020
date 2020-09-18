<?php

namespace Tests;

const ENG_TEXT = 'Lorem ipsum dolor stats sit deified amet. Malayalam consectetur level adipiscing elit, sed do eiusmod kayak tempor incididunt ut labore et dolore magna aliqua. Ut repaper enim ad minim veniam, quis nostrud boob exercitation reviver ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
const UKR_TEXT = 'Тут зараз може бути багато тексту але його не буде.';

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
