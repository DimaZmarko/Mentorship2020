<?php

namespace src\Services;

use src\Report\Report;
use src\Storage\Storage;

/**
 * Class TextAnalyzer
 * @package src\Services
 */
class TextAnalyzer
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var Storage
     */
    private $storage;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * TextAnalyzer constructor.
     * @param Storage $storage
     * @throws \Exception
     */
    public function __construct(Storage $storage)
    {
        $this->startDate = new \DateTime();
        $this->storage = $storage;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getReport()
    {
        $storedReport = $this->storage->getReportByHash(md5($this->text));

        if ($storedReport) {
            return $storedReport->buildReport();
        }

        $report = (new Report())
            ->setCharsCount($this->getNumberOfCharacters())
            ->setWordsCount($this->getNumberOfWords())
            ->setSentencesCount($this->getNumberOfSentences())
            ->setAverageNumberWordsInSentence($this->getAverageNumberWordsInSentence())
            ->setAverageWordsLength($this->getAverageWordLength())
            ->setCharsFrequency($this->getFrequencyOfCharacters())
            ->setLongestWords($this->getLongestWords())
            ->setLongestSentences($this->getLongestSentences())
            ->setShortestWords($this->getShortestWords())
            ->setShortestSentences($this->getShortestSentences())
            ->setPalindromeWords($this->getPalindromeWords())
            ->setPalindromeWordsCount($this->getPalindromeWordsCount())
            ->setIsWholePalindrome($this->getIsWholePalindromeString())
            ->setReversedChars($this->getReversedChars())
            ->setReversedWords($this->getReversedWords())
            ->setReportStartTime($this->startDate)
            ->setHash(md5($this->text));

        $id = $this->storage->saveReport($report);

        if (!isset($_SESSION['reports'])) {
            $_SESSION['reports'] = array();
        }

        array_push($_SESSION['reports'], $id);

        return $report
            ->setId($id)
            ->buildReport();
    }

    /**
     * @return string
     */
    public function getReversedChars()
    {
        return $this->mb_strrev($this->text);
    }

    /**
     * @return string
     */
    public function getReversedWords()
    {
        $wordsArray = explode(' ', $this->text);

        return implode(' ', array_reverse($wordsArray));
    }

    /**
     * @return int
     */
    public function getNumberOfCharacters()
    {
        return strlen($this->text);
    }

    /**
     * @return int
     */
    public function getNumberOfWords()
    {
        return str_word_count($this->text);
    }

    /**
     * @return int
     */
    public function getNumberOfSentences()
    {
        $sentences = preg_split('/(\.|\?|\!)(\s)/', $this->text);
        return count($sentences);
    }

    /**
     * @return array
     */
    public function getFrequencyOfCharacters()
    {
        $frequency = array();

        foreach ($this->mb_count_chars($this->text) as $char => $count) {
            $frequency[$char] = $count;
        }

        return $frequency;
    }

    /**
     * @return float|int
     */
    public function getAverageWordLength()
    {
        $wordCount = 0;
        $wordLength = 0;

        $totalWords = $this->getTotalWords();
        foreach ($totalWords as $word) {
            $wordCount++;
            $wordLength += mb_strlen($word);
        }

        return $wordLength / $wordCount;
    }

    /**
     * @return int
     */
    public function getAverageNumberWordsInSentence()
    {
        return intval($this->getNumberOfWords() / $this->getNumberOfSentences());
    }

    /**
     * @return array
     */
    public function getLongestWords()
    {
        $totalWords = $this->getTotalWords();
        $wordsLen = [];
        $words = [];
        foreach ($totalWords as $str) {
            $wordsLen[] = mb_strlen(preg_replace('/[^ a-zа-яёі\d]/ui', '', $str));
        }

        arsort($wordsLen);

        $i = 0;
        foreach ($wordsLen as $key => $value) {
            if ($i < 10) {
                $words[] = preg_replace('/[^ a-zа-яёі\d]/ui', '', $totalWords[$key]);
            }
            $i++;
        }

        return $words;
    }

    /**
     * @return array
     */
    public function getShortestWords()
    {
        $totalWords = $this->getTotalWords();
        $wordsLen = [];
        $words = [];

        foreach ($totalWords as $word) {
            $wordsLen[] = mb_strlen(preg_replace('/[^ a-zа-яёі\d]/ui', '', $word));
        }

        asort($wordsLen);

        $i = 0;
        foreach ($wordsLen as $key => $value) {
            if ($i < 10) {
                $words[] = preg_replace('/[^ a-zа-яёі\d]/ui', '', $totalWords[$key]);
            }
            $i++;
        }

        return $words;
    }

    /**
     * @return array
     */
    protected function getTotalSentences()
    {
        $totalSentences = preg_split('/(\.|\?|\!)(\s)/', $this->text);
        $sentencesLen = [];

        foreach ($totalSentences as $str) {
            $trimSentence = trim($str, ' ');
            $sentenceToWords = explode(' ', $trimSentence);
            $count = count($sentenceToWords);
            $sentencesLen[$trimSentence] = $count;
        }

        return $sentencesLen;
    }

    /**
     * @return array
     */
    public function getLongestSentences()
    {
        $sentencesLen = $this->getTotalSentences();
        $sentences = [];

        arsort($sentencesLen);

        $i = 0;
        foreach ($sentencesLen as $key => $sentence) {
            if ($i < 10) {
                $sentences[] = trim($key);
            }
            $i++;
        }

        return $sentences;
    }

    /**
     * @return array
     */
    public function getShortestSentences()
    {
        $sentencesLen = $this->getTotalSentences();
        $sentences = [];

        asort($sentencesLen);

        $i = 0;
        foreach ($sentencesLen as $key => $sentence) {
            if ($i < 10) {
                $sentences[] = trim($key);
            }
            $i++;
        }

        return $sentences;
    }

    /**
     * @param string|null $string
     * @return bool
     */
    public function getIsWholePalindromeString(string $string = null)
    {
        $isPalindrome = false;

        $noSpaces = preg_replace(
            '/[^ a-zа-яёі\d]/ui',
            '',
            strtolower(str_replace(' ', '', $string ?? $this->text))
        );

        if (mb_strlen($noSpaces) > 2) {
            if ($noSpaces === $this->mb_strrev($noSpaces)) {
                $isPalindrome = true;
            }
        }

        return $isPalindrome;
    }

    /**
     * @param $input
     * @return array
     */
    private function mb_count_chars($input)
    {
        $length = mb_strlen($input, 'UTF-8');
        $unique = array();
        for ($i = 0; $i < $length; $i++) {
            $char = mb_substr($input, $i, 1, 'UTF-8');
            if (!array_key_exists($char, $unique))
                $unique[$char] = 0;
            $unique[$char]++;
        }
        return $unique;
    }

    /**
     * @param $text
     * @return string
     */
    private function mb_strrev($text)
    {
        return join('', array_reverse(
            preg_split('~~u', $text, -1, PREG_SPLIT_NO_EMPTY)
        ));
    }

    /**
     * @return array[]|false|string[]
     */
    protected function getTotalWords()
    {
        return preg_split('/\s+/', $this->text, -1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * @return array
     */
    public function getPalindromeWords()
    {
        $totalWords = $this->getTotalWords();
        $longestPalindrome = [];
        $palindromeWords = [];
        $i = 0;
        $data = [];

        foreach ($totalWords as $word) {
            if ($this->getIsWholePalindromeString($word)) {
                $palindromeWords[] = trim($word);
            }
        }

        foreach ($palindromeWords as $palindromeWord) {
            $longestPalindrome[strtolower($palindromeWord)] = mb_strlen($palindromeWord);
        }

        arsort($longestPalindrome);

        foreach ($longestPalindrome as $key => $value) {
            if ($i < 10) {
                $data[] = $key;
            }
            $i++;
        }

        return $data;
    }

    /**
     * @return int
     */
    public function getPalindromeWordsCount()
    {
        $totalWords = $this->getTotalWords();
        $count = 0;

        foreach ($totalWords as $word) {
            if ($this->getIsWholePalindromeString($word)) {
                $count += 1;
            }
        }
        return $count;
    }
}
