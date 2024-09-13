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
    <link rel="stylesheet" href="styles/status.css">

</head>

<body>

    <!-- HEADER nav bar start -->
    <?php include 'header.php'; ?>
    <!-- HEADER nav bar end -->

    <!-- main content start -->
    <main>
        <div class="container">
            <div class="row justify-content-between align-items-start mt-5">
                <!-- Date Prediction Section -->
                <div class="col-md-4">
                    <div class="prediction-box">
                        <h4>Date Prediction</h4>

                        <!-- Date Picker -->
                        <label for="date" class="form-label">Choose a date:</label>
                        <input type="date" id="date" class="form-control mb-3">

                        <!-- Forecast and Predict buttons -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">Forecast</button>
                            <button type="button" class="btn btn-success">Predict</button>
                        </div>
                    </div>
                </div>

                <!-- Image and Legend Section -->
                <div class="col-md-5 text-center">
                    <!-- Report Image Section -->
                    <div class="report-image image-container">
                        <img src="assets/LLDA-MAPPED.png" alt="Quarterly Report" class="img-fluid">
                        <svg class="svg-overlay" viewBox="0 0 600 600"  preserveAspectRatio="xMidYMid meet">
                            
                            <circle class="clickable-circle" cx="307" cy="63" r="8" fill="green" data-bs-toggle="modal" data-bs-target="#minorModal" />

                            <circle class="clickable-circle" cx="366" cy="133" r="8" fill="orange" data-bs-toggle="modal" data-bs-target="#moderateModal" />

                            <circle class="clickable-circle" cx="466" cy="352" r="8" fill="red" data-bs-toggle="modal" data-bs-target="#massiveModal" />

                            <circle class="clickable-circle" cx="240" cy="365" r="8" fill="green" data-bs-toggle="modal" data-bs-target="#minorModal" />

                            <circle class="clickable-circle" cx="233" cy="493" r="8" fill="orange" data-bs-toggle="modal" data-bs-target="#moderateModal" />

                            <circle class="clickable-circle" cx="346" cy="635" r="8" fill="red" data-bs-toggle="modal" data-bs-target="#massiveModal" />
                        </svg>
                    </div>
                </div>

                <!-- Legend Section -->
                <div class="col-md-3">
                    <div class="legend">
                        <h5>Legend</h5>
                        <ul class="list-unstyled">
                            <li><span style="color: green;">●</span> Minor</li>
                            <li><span style="color: orange;">●</span> Massive</li>
                            <li><span style="color: red;">●</span> Moderate</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Minor Modal -->
    <div class="modal fade" id="minorModal" tabindex="-1" aria-labelledby="minorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="minorModalLabel">Minor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Information about minor occurrences.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Moderate Modal -->
    <div class="modal fade" id="moderateModal" tabindex="-1" aria-labelledby="moderateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="moderateModalLabel">Moderate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Information about moderate occurrences.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Massive Modal -->
    <div class="modal fade" id="massiveModal" tabindex="-1" aria-labelledby="massiveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="massiveModalLabel">Massive</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Information about massive occurrences.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- main content end -->

    <!-- FOOTER Section Start -->
    <?php include 'footer.php'; ?>
    <!-- FOOTER Section End -->


    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>