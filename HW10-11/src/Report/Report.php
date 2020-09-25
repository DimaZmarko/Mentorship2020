<?php

namespace src\Report;

/**
 * Class Report
 * @package src\Report
 */
class Report
{
    /**
     * @var int|null
     */
    protected $id;

    /**
     * @var int
     */
    protected $wordsCount;

    /**
     * @var int
     */
    protected $charsCount;

    /**
     * @var int
     */
    protected $sentencesCount;

    /**
     * @var
     */
    protected $charsFrequency;

    /**
     * @var int
     */
    protected $averageWordsLength;

    /**
     * @var int
     */
    protected $averageNumberWordsInSentence;

    /**
     * @var array
     */
    protected $longestWords;

    /**
     * @var array
     */
    protected $shortestWords;

    /**
     * @var string
     */
    protected $hash;

    /**
     * @var array
     */
    protected $longestSentences;

    /**
     * @var array
     */
    protected $shortestSentences;

    /**
     * @var bool
     */
    protected $isWholePalindrome;

    /**
     * @var array
     */
    protected $palindromeWords;

    /**
     * @var int
     */
    protected $palindromeWordsCount;

    /**
     * @var string
     */
    protected $reversedChars;

    /**
     * @var string
     */
    protected $reversedWords;

    /**
     * @var \DateTime
     */
    protected $reportStartTime;

    /**
     * Report constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param int $wordsCount
     * @return Report
     */
    public function setWordsCount(int $wordsCount)
    {
        $this->wordsCount = $wordsCount;
        return $this;
    }

    /**
     * @param string $hash
     * @return Report
     */
    public function setHash(string $hash): Report
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $charsCount
     * @return Report
     */
    public function setCharsCount($charsCount)
    {
        $this->charsCount = $charsCount;
        return $this;
    }

    /**
     * @param mixed $sentencesCount
     * @return Report
     */
    public function setSentencesCount($sentencesCount)
    {
        $this->sentencesCount = $sentencesCount;
        return $this;
    }

    /**
     * @param mixed $charsFrequency
     * @return Report
     */
    public function setCharsFrequency($charsFrequency)
    {
        $this->charsFrequency = $charsFrequency;
        return $this;
    }

    /**
     * @param mixed $averageWordsLength
     * @return Report
     */
    public function setAverageWordsLength($averageWordsLength)
    {
        $this->averageWordsLength = $averageWordsLength;
        return $this;
    }

    /**
     * @param mixed $averageNumberWordsInSentence
     * @return Report
     */
    public function setAverageNumberWordsInSentence($averageNumberWordsInSentence)
    {
        $this->averageNumberWordsInSentence = $averageNumberWordsInSentence;
        return $this;
    }

    /**
     * @param mixed $longestWords
     * @return Report
     */
    public function setLongestWords($longestWords)
    {
        $this->longestWords = $longestWords;
        return $this;
    }

    /**
     * @param mixed $shortestWords
     * @return Report
     */
    public function setShortestWords($shortestWords)
    {
        $this->shortestWords = $shortestWords;
        return $this;
    }

    /**
     * @param mixed $longestSentences
     * @return Report
     */
    public function setLongestSentences($longestSentences)
    {
        $this->longestSentences = $longestSentences;
        return $this;
    }

    /**
     * @param mixed $shortestSentences
     * @return Report
     */
    public function setShortestSentences($shortestSentences)
    {
        $this->shortestSentences = $shortestSentences;
        return $this;
    }

    /**
     * @param mixed $isWholePalindrome
     * @return Report
     */
    public function setIsWholePalindrome($isWholePalindrome)
    {
        $this->isWholePalindrome = $isWholePalindrome;
        return $this;
    }

    /**
     * @param mixed $palindromeWords
     * @return Report
     */
    public function setPalindromeWords($palindromeWords)
    {
        $this->palindromeWords = $palindromeWords;
        return $this;
    }

    /**
     * @param mixed $palindromeWordsCount
     * @return Report
     */
    public function setPalindromeWordsCount($palindromeWordsCount)
    {
        $this->palindromeWordsCount = $palindromeWordsCount;
        return $this;
    }

    /**
     * @param mixed $reversedChars
     * @return Report
     */
    public function setReversedChars($reversedChars)
    {
        $this->reversedChars = $reversedChars;
        return $this;
    }

    /**
     * @param mixed $reversedWords
     * @return Report
     */
    public function setReversedWords($reversedWords)
    {
        $this->reversedWords = $reversedWords;
        return $this;
    }

    /**
     * @param mixed $reportDateTime
     * @return Report
     */
    public function setReportStartTime($reportDateTime)
    {
        $this->reportStartTime = $reportDateTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }


    /**
     * @return int
     */
    public function getWordsCount(): int
    {
        return $this->wordsCount;
    }

    /**
     * @return int
     */
    public function getCharsCount(): int
    {
        return $this->charsCount;
    }

    /**
     * @return int
     */
    public function getSentencesCount(): int
    {
        return $this->sentencesCount;
    }

    /**
     * @return mixed
     */
    public function getCharsFrequency()
    {
        return $this->charsFrequency;
    }

    /**
     * @return int
     */
    public function getAverageWordsLength(): int
    {
        return $this->averageWordsLength;
    }

    /**
     * @return int
     */
    public function getAverageNumberWordsInSentence(): int
    {
        return $this->averageNumberWordsInSentence;
    }

    /**
     * @return array
     */
    public function getLongestWords(): array
    {
        return $this->longestWords;
    }

    /**
     * @return array
     */
    public function getShortestWords(): array
    {
        return $this->shortestWords;
    }

    /**
     * @return array
     */
    public function getLongestSentences(): array
    {
        return $this->longestSentences;
    }

    /**
     * @return array
     */
    public function getShortestSentences(): array
    {
        return $this->shortestSentences;
    }

    /**
     * @return bool
     */
    public function isWholePalindrome(): bool
    {
        return $this->isWholePalindrome;
    }

    /**
     * @return array
     */
    public function getPalindromeWords(): array
    {
        return $this->palindromeWords;
    }

    /**
     * @return int
     */
    public function getPalindromeWordsCount(): int
    {
        return $this->palindromeWordsCount;
    }

    /**
     * @return string
     */
    public function getReversedChars(): string
    {
        return $this->reversedChars;
    }

    /**
     * @return string
     */
    public function getReversedWords(): string
    {
        return $this->reversedWords;
    }

    /**
     * @return \DateTime
     */
    public function getReportStartTime(): \DateTime
    {
        return $this->reportStartTime;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function buildReport()
    {
        $report =
            '<div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">';

        if ($this->charsCount) {
            $report .= '<div>
                            <strong>Number of characters:</strong>' . $this->charsCount . '
                        </div>';
        }

        if ($this->wordsCount) {
            $report .= '<div>
                            <strong>Number of words:</strong>' . $this->wordsCount . '
                        </div>';
        }

        if ($this->sentencesCount) {
            $report .= '<div>
                            <strong>Number of sentences:</strong>' . $this->sentencesCount . '
                        </div>';
        }

        if ($this->charsFrequency) {
            $report .= '<div>
                            <strong>Frequency of characters:</strong>
                            <ul>';

            foreach ($this->charsFrequency as $char => $frequency) {
                $report .= '<li>Char - ' . $char . ' occurs ' . $frequency . '</li>';
            }

            $report .= '</ul>
                </div>';
        }

        if ($this->averageWordsLength) {
            $report .= '<div>
                            <strong>Average word length:</strong>' . $this->averageWordsLength . '
                        </div>';
        }

        if ($this->averageNumberWordsInSentence) {
            $report .= '<div>
                            <strong>Average nuber of words in sentences:</strong>' . $this->averageNumberWordsInSentence . '
                        </div>';
        }

        if ($this->longestWords && count($this->longestWords)) {
            $report .= '<div>
                            <strong>Top 10 longest words:</strong>
                            <ol>';

            foreach ($this->longestWords as $word) {
                $report .= '<li>' . $word . '</li>';
            }

            $report .= '</ol></div>';
        }

        if ($this->shortestWords && count($this->shortestWords)) {
            $report .= '<div>
                            <strong>Top 10 shortest words:</strong>
                            <ol>';

            foreach ($this->shortestWords as $word) {
                $report .= '<li>' . $word . '</li>';
            }

            $report .= '</ol></div>';
        }

        if ($this->longestSentences && count($this->longestSentences)) {
            $report .= '<div>
                            <strong>Top 10 longest sentences:</strong>
                            <ol>';

            foreach ($this->longestSentences as $sentence) {
                $report .= '<li>' . $sentence . '</li>';
            }

            $report .= '</ol></div>';
        }

        if ($this->shortestSentences && count($this->shortestSentences)) {
            $report .= '<div>
                            <strong>Top 10 shortest sentences:</strong>
                            <ol>';

            foreach ($this->shortestSentences as $sentence) {
                $report .= '<li>' . $sentence . '</li>';
            }

            $report .= '</ol></div>';
        }

        if ($this->palindromeWordsCount) {
            $report .= '<div>
                            <strong>Number of palindrome words:</strong>' . $this->palindromeWordsCount . '
                        </div>';
        }

        if ($this->palindromeWords && count($this->palindromeWords)) {
            $report .= '<div>
                            <strong>Top 10 longest palindrome words:</strong>
                            <ol>';

            foreach ($this->palindromeWords as $word) {
                $report .= '<li>' . $word . '</li>';
            }

            $report .= '</ol></div>';
        }

        $report .= '<div>
                        <strong>Is text whole palindrome: </strong>' . ($this->isWholePalindrome ? 'Yes' : 'No') . '
                    </div>';

        if ($this->reversedChars) {
            $report .= '<div>
                            <strong>Reversed characters:</strong>' . $this->reversedChars . '
                        </div>';
        }

        if ($this->reversedWords) {
            $report .= '<div>
                            <strong>Reversed words:</strong>' . $this->reversedWords . '
                        </div>';
        }

        $report .= '<div>
                        <strong>Report was generated at:</strong>' . (new \DateTime())->format('n/j/Y - g:i A') . '
                    </div>';

        if ($this->reportStartTime) {
            $report .= '<div>
                            <strong>Report duration:</strong>' . ((new \DateTime())->getTimestamp() - $this->reportStartTime->getTimestamp()) . '
                        </div>';
        }

        if ($this->id) {
            $report .= '<div>
                            <form method="post" action="export.php">
                                <input type="hidden" name="report_id" value="' . $this->id . '">
                                <label for="">CSV
                                    <input type="radio" name="export" value="csv">
                                </label>
                                <label for="">XLS
                                    <input type="radio" name="export" value="xls">
                                </label>
                                <label for="">PDF
                                    <input type="radio" name="export" value="pdf">
                                </label>
                                
                                <input type="submit" value="Export report">                               
                            </form>
                        </div>';
        }

        $report .= '</div>
            </div>
        </div>';

        return $report;
    }
}
