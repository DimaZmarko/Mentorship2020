<?php

namespace Tests;

class IsPalindromeWordTest extends BaseTest
{
	public function positiveDataProvider()
	{
		return [
			['Red rum, sir, is murder'],
			['Eva, can I see bees in a cave?'],
			['Машина їде по дорозі.'],
		];
	}

	/**
	 * @param $string
	 *
	 * @dataProvider positiveDataProvider
	 */
	public function testPositive($string)
	{
		$result = $this->textAnalyzer->getIsWholePalindromeString($string);
		$this->assertTrue($result);
	}
}
