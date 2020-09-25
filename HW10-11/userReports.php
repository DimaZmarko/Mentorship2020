<?php

if (!isset($_SESSION['reports']) || empty($_SESSION['reports'])) {
    die('User does not have any reports yet!');
}

require_once 'src/autoloader.php';
require_once 'template-parts/header.php';

$storage = new src\Storage\Storage();
$reports = $storage->getReportsByIds($_SESSION['reports']); ?>

    <div class="container">
        <div class="row text-center my-4">
            <?php
            /**
             * @var \src\Report\Report $report
             */
            foreach ($reports as $report) {
                echo $report->buildReport();
            }
            ?>
        </div>
    </div>

<?php require_once 'template-parts/footer.php';
