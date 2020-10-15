<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;

if (isset($_POST['report_id'])) {
    $report = (new src\Storage\Storage())->getReportsById((int)$_POST['report_id']);

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    //titles
    $sheet->setCellValue('A1', 'Words count:')
        ->setCellValue('A1', 'Chars count:')
        ->setCellValue('A1', 'Sentences count:')
        ->setCellValue('A1', 'Chars Frequency:')
        ->setCellValue('A1', 'Average words len:')
        ->setCellValue('A1', 'Average number of words:')
        ->setCellValue('A1', 'Longest words:')
        ->setCellValue('A1', 'Shortest words:')
        ->setCellValue('A1', 'Longest sentences:')
        ->setCellValue('A1', 'Shortest sentences:')
        ->setCellValue('A1', 'Is whole palindrome:')
        ->setCellValue('A1', 'Palindrome words:')
        ->setCellValue('A1', 'Palindrome words count:')
        ->setCellValue('A1', 'Reversed chars:')
        ->setCellValue('A1', 'Reversed words:')
        ->setCellValue('A1', 'Report time:');

    //values
    $sheet->setCellValue('B1', $report->getWordsCount())
        ->setCellValue('B1', $report->getCharsCount())
        ->setCellValue('B1', $report->getSentencesCount())
        ->setCellValue('B1', $report->getCharsFrequency())
        ->setCellValue('B1', $report->getAverageWordsLength())
        ->setCellValue('B1', $report->getAverageNumberWordsInSentence())
        ->setCellValue('B1', $report->getLongestWords())
        ->setCellValue('B1', $report->getShortestWords())
        ->setCellValue('B1', $report->getLongestSentences())
        ->setCellValue('B1', $report->getShortestSentences())
        ->setCellValue('B1', $report->isWholePalindrome() ? 'yes' : 'no')
        ->setCellValue('B1', $report->getPalindromeWords())
        ->setCellValue('B1', $report->getPalindromeWordsCount())
        ->setCellValue('B1', $report->getReversedChars())
        ->setCellValue('B1', $report->getReversedWords())
        ->setCellValue('B1', $report->getReportStartTime()->format('n/j/Y - g:i A'));

    if ($_POST['export'] === 'xls') {
        $reportName = 'report' . rand() . '.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save($reportName);

        header("Content-disposition: attachment; filename=$reportName");
        header("Content-type: application/vnd.ms-excel");
        readfile($reportName);
    } elseif ($_POST['export'] === 'csv') {
        $reportName = 'report' . rand() . '.csv';
        $writer = new Csv($spreadsheet);
        $writer->save($reportName);

        header("Content-disposition: attachment; filename=$reportName");
        header("Content-type: application/csv");
        readfile($reportName);
    } elseif ($_POST['export'] === 'pdf') {
        $reportName = 'report' . rand() . '.pdf';
        $writer = new Mpdf($spreadsheet);
        $writer->save($reportName);

        header("Content-disposition: attachment; filename=$reportName");
        header("Content-type: application/pdf");
        readfile($reportName);
    }
}
