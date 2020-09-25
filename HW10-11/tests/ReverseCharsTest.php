<?php

namespace Tests;

class ReverseCharsTest extends BaseTest
{
	public function positiveDataProvider()
	{
		return [
			['The reversed text.', '.txet desrever ehT'],
			['Всім привіт!', '!тівирп місВ'],
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
		$result = $this->textAnalyzer->getReversedChars($string);
		$this->assertEquals($expected, $result);
	}
}
