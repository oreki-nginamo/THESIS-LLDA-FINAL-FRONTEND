<?php
include "status_backend.php"


?>



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
                        <form method="get" action="status.php">
                        <label for="date" class="form-label">Choose a date:</label>
                        <input type="date" id="date" class="form-control mb-3" name="date" min="<?php echo min($dates); ?>" max="<?php echo max($dates); ?>" value="<?php echo isset($_GET['date']) ? $_GET['date'] : date('Y-m-d', strtotime('+1 day')); ?>">

                        <!-- Forecast and Predict buttons -->
                        <div class="btn-group">
                            
                            <button type="submit" class="btn btn-success" value="Forecast">Forecast</button>
                        </form>
                        <form action="status.php" method="post">
                            <button type="submit" class="btn btn-success" value="Predict">Predict</button>
                        </form>
                        </div>
                    </div>
                </div>

                <!-- Image and Legend Section -->
                <div class="col-md-5 text-center">
                    <!-- Report Image Section -->
                    <div class="report-image image-container">
                        <img src="assets/LLDA-MAPPED.png" alt="Quarterly Report" class="img-fluid">
                        <svg class="svg-overlay" viewBox="0 0 600 600"  preserveAspectRatio="xMidYMid meet">
                            
                            <circle class="clickable-circle" cx="307" cy="63" r="8" fill="green" data-bs-toggle="modal" data-bs-target="#Station_XIII" />

                            <circle class="clickable-circle" cx="366" cy="133" r="8" fill="orange" data-bs-toggle="modal" data-bs-target="#Station_V" />

                            <circle class="clickable-circle" cx="466" cy="352" r="8" fill="red" data-bs-toggle="modal" data-bs-target="#Station_XIX" />

                            <circle class="clickable-circle" cx="240" cy="365" r="8" fill="green" data-bs-toggle="modal" data-bs-target="#Station_I" />

                            <circle class="clickable-circle" cx="233" cy="493" r="8" fill="orange" data-bs-toggle="modal" data-bs-target="#Station_XV" />

                            <circle class="clickable-circle" cx="346" cy="635" r="8" fill="red" data-bs-toggle="modal" data-bs-target="#Station_XVI" />
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
    
    <!-- Station_XIII -->
    <div class="modal fade" id="Station_XIII" tabindex="-1" aria-labelledby="minorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="minorModalLabel">Minor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
<!--Prediction from here-->
                            <?php 
                            $station_to_display = 'Stn XIII (Taytay)'; // Replace 'Station Name' with the actual station name you want to display
                            if (isset($phyto[$station_to_display])) {
                                // Round off the prediction to the nearest whole number
                                $rounded_prediction = round($phyto[$station_to_display]);
                                echo "<b>Prediction for " . $station_to_display . ":</b> " . $rounded_prediction . "counts/mL<br>";
                                    if ($rounded_prediction <= 10000) {
                                        echo "<b>Minor:</b> Minimal or no noticeable impact on water quality. Some visible bloom may be present, but effects on aquatic life are typically limited.";
                                        
                                    } elseif ($rounded_prediction <= 100000) {
                                        echo "<b>Moderate:</b> Visible bloom with potential moderate impacts on water quality, including reduced oxygen levels. Potentially harmful to aquatic ecosystems.";
                                    } else {
                                        echo "<b>Massive:</b> Severe bloom with significant impacts, including potential toxin production, severe oxygen depletion, and major disruptions to aquatic life and water usability.";
                                    }

                            } else {
                                echo "No prediction available for " . $station_to_display . "\n";
                            }

                        ?>
<!--To Here-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Station_V -->
    <div class="modal fade" id="Station_V" tabindex="-1" aria-labelledby="moderateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="moderateModalLabel">Moderate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
<!--Prediction from here-->
                        <?php 
                            $station_to_display = 'Stn V (Northern West Bay)'; // Replace 'Station Name' with the actual station name you want to display
                            if (isset($phyto[$station_to_display])) {
                                // Round off the prediction to the nearest whole number
                                $rounded_prediction = round($phyto[$station_to_display]);
                                echo "<b>Prediction for " . $station_to_display . ":</b> " . $rounded_prediction . "counts/mL <br>";
                                    if ($rounded_prediction <= 10000) {
                                        echo "<b>Minor:</b> Minimal or no noticeable impact on water quality. Some visible bloom may be present, but effects on aquatic life are typically limited.";
                                        
                                    } elseif ($rounded_prediction <= 100000) {
                                        echo "<b>Moderate:</b> Visible bloom with potential moderate impacts on water quality, including reduced oxygen levels. Potentially harmful to aquatic ecosystems.";
                                    } else {
                                        echo "<b>Massive:</b> Severe bloom with significant impacts, including potential toxin production, severe oxygen depletion, and major disruptions to aquatic life and water usability.";
                                    }

                            } else {
                                echo "No prediction available for " . $station_to_display . "\n";
                            }

                        ?>
<!--To Here-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Station_XIX -->
    <div class="modal fade" id="Station_XIX" tabindex="-1" aria-labelledby="massiveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="massiveModalLabel">Massive</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
<!--Prediction from here-->
                    <?php 
                        $station_to_display = 'Stn XIX (Muntinlupa)'; // Replace 'Station Name' with the actual station name you want to display
                        if (isset($phyto[$station_to_display])) {
                            // Round off the prediction to the nearest whole number
                            $rounded_prediction = round($phyto[$station_to_display]);
                            echo "<b>Prediction for " . $station_to_display . ":</b> " . $rounded_prediction . "counts/mL <br>";
                                if ($rounded_prediction <= 10000) {
                                    echo "<b>Minor: </b>Minimal or no noticeable impact on water quality. Some visible bloom may be present, but effects on aquatic life are typically limited.";
                                    
                                } elseif ($rounded_prediction <= 100000) {
                                    echo "<b>Moderate: </b>Visible bloom with potential moderate impacts on water quality, including reduced oxygen levels. Potentially harmful to aquatic ecosystems.";
                                } else {
                                    echo "<b>Massive: </b>Severe bloom with significant impacts, including potential toxin production, severe oxygen depletion, and major disruptions to aquatic life and water usability.";
                                }

                        } else {
                            echo "No prediction available for " . $station_to_display . "\n";
                        }

                    ?>
<!--To Here-->         
  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Station_I -->
    <div class="modal fade" id="Station_I" tabindex="-1" aria-labelledby="massiveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="massiveModalLabel">Massive</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
<!--Prediction from here-->
                    <?php 
                        $station_to_display = 'Stn. I (Central West Bay)'; // Replace 'Station Name' with the actual station name you want to display
                        if (isset($phyto[$station_to_display])) {
                            // Round off the prediction to the nearest whole number
                            $rounded_prediction = round($phyto[$station_to_display]);
                            echo "<b>Prediction for " . $station_to_display . ": </b>" . $rounded_prediction . "counts/mL <br>";
                                if ($rounded_prediction <= 10000) {
                                    echo "<b>Minor:</b> Minimal or no noticeable impact on water quality. Some visible bloom may be present, but effects on aquatic life are typically limited.";
                                    
                                } elseif ($rounded_prediction <= 100000) {
                                    echo "<b>Moderate:</b> Visible bloom with potential moderate impacts on water quality, including reduced oxygen levels. Potentially harmful to aquatic ecosystems.";
                                } else {
                                    echo "<b>Massive:</b>Severe bloom with significant impacts, including potential toxin production, severe oxygen depletion, and major disruptions to aquatic life and water usability.";
                                }

                        } else {
                            echo "No prediction available for " . $station_to_display . "\n";
                        }

                    ?>
<!--To Here--> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Station_XV -->
    <div class="modal fade" id="Station_XV" tabindex="-1" aria-labelledby="massiveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="massiveModalLabel">Massive</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
<!--Prediction from here-->
                    <?php 
                        $station_to_display = 'Stn XV (San Pedro)'; // Replace 'Station Name' with the actual station name you want to display
                        if (isset($phyto[$station_to_display])) {
                            // Round off the prediction to the nearest whole number
                            $rounded_prediction = round($phyto[$station_to_display]);
                            echo "<b>Prediction for " . $station_to_display . ":</b> " . $rounded_prediction . "counts/mL <br>";
                                if ($rounded_prediction <= 10000) {
                                    echo "<b>Minor:</b> Minimal or no noticeable impact on water quality. Some visible bloom may be present, but effects on aquatic life are typically limited.";
                                    
                                } elseif ($rounded_prediction <= 100000) {
                                    echo "<b>Moderate:</b> Visible bloom with potential moderate impacts on water quality, including reduced oxygen levels. Potentially harmful to aquatic ecosystems.";
                                } else {
                                    echo "<b>Massive:</b> Severe bloom with significant impacts, including potential toxin production, severe oxygen depletion, and major disruptions to aquatic life and water usability.";
                                }

                        } else {
                            echo "No prediction available for " . $station_to_display . "\n";
                        }

                    ?>
<!--To Here-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Station_XVI -->
    <div class="modal fade" id="Station_XVI" tabindex="-1" aria-labelledby="massiveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="massiveModalLabel">Massive</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
<!--Prediction from here-->
                    <?php 
                        $station_to_display = 'Stn.XVI (Sta Rosa)'; // Replace 'Station Name' with the actual station name you want to display
                        if (isset($phyto[$station_to_display])) {
                            // Round off the prediction to the nearest whole number
                            $rounded_prediction = round($phyto[$station_to_display]);
                            echo "<b>Prediction for " . $station_to_display . ":</b> " . $rounded_prediction . "counts/mL <br>";
                                if ($rounded_prediction <= 10000) {
                                    echo "<b>Minor:</b> Minimal or no noticeable impact on water quality. Some visible bloom may be present, but effects on aquatic life are typically limited.";
                                    
                                } elseif ($rounded_prediction <= 100000) {
                                    echo "<b>Moderate:</b> Visible bloom with potential moderate impacts on water quality, including reduced oxygen levels. Potentially harmful to aquatic ecosystems.";
                                } else {
                                    echo "<b>Massive:</b> Severe bloom with significant impacts, including potential toxin production, severe oxygen depletion, and major disruptions to aquatic life and water usability.";
                                }

                        } else {
                            echo "No prediction available for " . $station_to_display . "\n";
                        }

                    ?>
<!--To Here-->
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