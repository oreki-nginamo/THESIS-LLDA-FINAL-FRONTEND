<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap css link -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Css Paths -->
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/report.css">

</head>

<body>

    <!-- HEADER nav bar start -->
    <?php include 'header.php'; ?>
    <!-- HEADER nav bar end -->

    <!-- Main content start -->
<main class="">
    <div class="row justify-content-center w-100">
        <!-- Uploaded PDF Reports Section -->
        <div class="col-md-4">
            <div class="uploaded-pdf-section bg-light p-3 rounded shadow-sm text-center">
                <h5 class="text-success">Uploaded PDF Reports</h5>
                <ul class="list-unstyled">
                    <li>
                        <input type="checkbox" class="me-2">
                        <a href="#">Virtual-Orientation-Narrative.pdf</a>
                    </li>
                    <li>
                        <input type="checkbox" class="me-2">
                        <a href="#">CSST_102_Midterm_Reviewer.pdf</a>
                    </li>
                    <li>
                        <input type="checkbox" class="me-2">
                        <a href="#">CMSC_310_Midterm_Reviewer.pdf</a>
                    </li>
                    <li>
                        <input type="checkbox" class="me-2">
                        <a href="#">CMSC_309_Midterm_Reviewer.pdf</a>
                    </li>
                </ul>
                 <!-- Delete Button -->
                 <button class="btn btn-danger w-100 mt-2" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Selected</button>
            </div>
        </div>

        <!-- Findings Section -->
        <div class="col-md-8">
            <div class="findings-section bg-light p-3 rounded shadow-sm">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="text-success">Findings</h5>
                    <div class="upload-section d-flex align-items-center">
                        <input type="file" class="form-control me-2" style="max-width: 250px;">
                        <button class="btn btn-success">Upload PDF</button>
                    </div>
                </div>
                <div class="findings-content bg-light p-4 rounded border">
                    <!-- Placeholder for PDF content or findings -->
                    <iframe id="pdfViewer" src="" width="100%" height="400px" style="border: none;"></iframe>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main content end -->


<!-- FOOTER Section Start -->
<?php include 'footer.php'; ?>
    <!-- FOOTER Section End -->

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the selected files? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
            </div>
        </div>
</div>

<!-- JavaScript for delete confirmation -->
<script>
    function confirmDelete() {
        // Close the modal
        let modalElement = document.getElementById('deleteModal');
        let modal = bootstrap.Modal.getInstance(modalElement);
        modal.hide();

        // Submit the form after confirming
        document.getElementById('pdfForm').submit();
    }
</script>
    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>