<?php require_once 'src/autoloader.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Text analyzer</title>

    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/custom.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Text analyzer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#uploadModal" data-toggle="modal">Upload new Text</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row text-center my-4">
        <?php
        $text = null;
        if (isset($_POST['text']) && !empty($_POST['text'])) {
            $text = $_POST['text'];
        } elseif (isset($_POST['link']) && !empty($_POST['link'])) {
            $entry = file_get_contents($_POST['link']);
            $text = htmlspecialchars($entry);
        } elseif (isset($_FILES['file']) && $_FILES['file']['size'] !== 0 && $_FILES['file']['error'] !== 4) {
            $entry = file_get_contents($_FILES['file']['tmp_name']);
            $text = htmlspecialchars($entry);
        }

        if ($text) {
            $analyzer = new \src\Services\TextAnalyzer($_POST['text']);

            echo $analyzer->getReport();
        }
        ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Put your text</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" name="upload_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Paste it here</label>
                        <textarea name="text" id="message-text" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Upload a file</label>
                        <input type="file" name="file" id="message-text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Or paste the link</label>
                        <input type="url" name="link" id="message-text" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Analyze text</button>
                </div>
            </form>
        </div>
    </div>
</div>

<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">My Website 2020</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.bundle.min.js"></script>

</body>
</html>
