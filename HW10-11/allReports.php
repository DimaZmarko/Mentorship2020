<?php

require_once 'src/autoloader.php';
require_once 'template-parts/header.php';

$storage = new src\Storage\Storage();
$reports = $storage->getAllReports(); ?>

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
