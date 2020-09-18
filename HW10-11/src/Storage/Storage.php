<?php

namespace src\Storage;

use PDO;
use src\Report\Report;

class Storage
{
    /**
     * @var PDO
     */
    private $conn;

    /**
     * PersonDatabaseStorage constructor.
     */
    public function __construct()
    {
        $this->conn = new PDO('mysql:host=localhost;dbname=report', 'root', '');
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @param Report $report
     * @return string
     */
    public function saveReport(Report $report): string
    {
        $stmt = $this->conn->prepare(
            'INSERT INTO reports (
                                             wordsCount,
                                             charsCount,
                                             sentencesCount,
                                             charsFrequency,
                                             averageWordsLenght,
                                             averageNumberWordsInSentence,
                                             longestWords,
                                             shortestWords,
                                             longestSentences,
                                             shortestSentences,
                                             isWholePalindrome,
                                             palindromeWords,
                                             palindromeWordsCount,
                                             reversedChars,
                                             reversedWords,
                                             reportStartTime,
                                             hash) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
        );
        $stmt->execute([
            $report->getWordsCount(),
            $report->getCharsCount(),
            $report->getSentencesCount(),
            json_encode($report->getCharsFrequency()),
            $report->getAverageWordsLength(),
            $report->getAverageNumberWordsInSentence(),
            implode(',', $report->getLongestWords()),
            implode(',', $report->getShortestWords()),
            implode(',', $report->getLongestSentences()),
            implode(',', $report->getShortestSentences()),
            $report->isWholePalindrome(),
            implode(',', $report->getPalindromeWords()),
            $report->getPalindromeWordsCount(),
            $report->getReversedChars(),
            $report->getReversedWords(),
            $report->getReportStartTime(),
            $report->getHash()
        ]);

        return $this->conn->lastInsertId();
    }

    /**
     * @return array
     */
    public function getAllReports(): array
    {
        $stmt = $this->conn->prepare('SELECT * FROM reports');
        $stmt->execute();

        $reports = [];
        while ($report = $stmt->fetchObject(Report::class)) {
            $reports[] = $report;
        }

        return $reports;
    }

    /**
     * @param array $ids
     * @return array
     */
    public function getReportsByIds(array $ids): array
    {
        $stmt = $this->conn->prepare('SELECT * FROM reports WHERE id IN (?)');
        $stmt->execute([implode(',', $ids)]);

        $reports = [];
        while ($report = $stmt->fetchObject(Report::class)) {
            $reports[] = $report;
        }

        return $reports;
    }

    /**
     * @param int $id
     * @return Report
     */
    public function getReportsById(int $id): Report
    {
        $stmt = $this->conn->prepare('SELECT * FROM reports WHERE id = ?');
        $stmt->execute([$id]);

        $report = $stmt->fetchObject(Report::class);

        return $report;
    }

    /**
     * @param string $hash
     * @return Report|null
     */
    public function getReportByHash(string $hash): ?Report
    {
        $stmt = $this->conn->prepare('SELECT * FROM reports WHERE hash = ?');
        $stmt->execute([$hash]);
        $report = $stmt->fetchObject(Report::class);

        return $report;
    }
}
