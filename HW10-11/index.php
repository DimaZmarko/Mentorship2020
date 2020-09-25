<?php require_once 'src/autoloader.php'; ?>

<?php require_once 'template-parts/header.php' ?>

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
            if ($_FILES['file']['type'] === 'application/xml') {
                $document = new DOMDocument();
                $document->loadXml(file_get_contents($_FILES['file']['tmp_name']));
                $text = $document->documentElement->textContent;
            } elseif ($_FILES['file']['type'] === 'text/html') {
                $entry = file_get_contents($_FILES['file']['tmp_name']);
                $text = htmlspecialchars($entry);
            } else {
                $entry = file_get_contents($_FILES['file']['tmp_name']);
                $text = htmlspecialchars($entry);
            }
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

<?php require_once 'template-parts/footer.php'; ?>
