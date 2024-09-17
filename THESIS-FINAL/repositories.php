<?php
error_reporting(E_ERROR | E_PARSE);
include "retrain.php";
include "upload.php";

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
    <link rel="stylesheet" href="styles/repositories.css">

    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

</head>

<body>

    <!-- HEADER nav bar start -->
    <?php include 'header.php'; ?>
    <!-- HEADER nav bar end -->

    <!-- main content start -->
    <main class="">
    <!-- Loading Screen -->
    <div id="loading-screen">
        <!-- Lottie animation player -->
        <dotlottie-player 
            src="https://lottie.host/d283b94d-6898-4495-9883-cdc6ada3e7b5/79Vf6zVZPx.json" 
            background="transparent" 
            speed="1" 
            style="width: 300px; height: 300px;" 
            loop 
            autoplay>
        </dotlottie-player>
    </div>
    <!-- Prediction Section -->
    <div class="card w-100 mb-5">
        <div class="card-body">
            <h1 class="pred_h1 text-center">Prediction</h1>
            <form action="repositories.php" method="POST">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Temperature</th>
                                <th>Humidity</th>
                                <th>Wind Speed</th>
                                <th>pH (units)</th>
                                <th>Ammonia (mg/L)</th>
                                <th>Inorganic Phosphate (mg/L)</th>
                                <th>BOD (mg/L)</th>
                                <th>Total coliforms (MPN/100ml)</th>
                                <th>Phytoplankton (cells/ml)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                
                                <td><input class="form-control" type="text" name="temperature" required></td>
                                <td><input class="form-control" type="text" name="humidity" required></td>
                                <td><input class="form-control" type="text" name="wind_speed" required></td>
                                <td><input class="form-control" type="text" name="ph" required></td>
                                <td><input class="form-control" type="text" name="ammonia" required></td>
                                <td><input class="form-control" type="text" name="phosphate" required></td>
                                <td><input class="form-control" type="text" name="bod"></td>
                                <td><input class="form-control" type="text" name="coliforms"></td>
                                <td><input class="form-control" type="text" value="<?php echo $rounded; ?>" disabled></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success mx-2" name="submit_flask">Predict</button>
                    <button type="reset" class="btn btn-secondary mx-2" name="reset_flask">Reset</button>
                    </form>
                </div>
            </form>
        </div>
    </div>

    <!-- Model Testing/Retraining Section -->
    <div class="card w-100 mb-5">
        <div class="card-body">
            <h1 class="text-center">Model Testing/Retraining</h1>
            <p class="text-center"><sup>This is used for uploading new datasets or retraining the model with the current dataset</sup></p>
            
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Upload Dataset (CSV Only): </label>
                    <input type="file" class="form-control" name="dataset" accept=".csv" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </form>

            <form class="train-form" action="" method="POST">
                <div class="mb-3">
                    <label for="dataset">Datasets Available:</label>
                    <select name="selected_dataset" id="dataset" class="form-select">
                        <option value="">Select a Dataset</option>
                        <!-- PHP loop to generate options dynamically -->
                        <?php
                        // Define the folder path
                        $folderPath = 'C:/Users/John Wilson/Desktop/Datamodel';  // Change this to the correct folder
                        if (is_dir($folderPath)) {
                            if ($folderHandle = opendir($folderPath)) {
                                while (($file = readdir($folderHandle)) !== false) {
                                    if ($file != '.' && $file != '..' && !is_dir($folderPath . '/' . $file)) {
                                        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
                                        if ($fileExtension == 'csv' || $fileExtension == 'txt') {
                                            echo "<option value=\"$file\">$file</option>";
                                        }
                                    }
                                }
                                closedir($folderHandle);
                            } else {
                                echo "<option value=''>Unable to open directory</option>";
                            }
                        } else {
                            echo "<option value=''>Folder does not exist</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-secondary mx-2" name="Retrain">Preview</button>
                    <button type="submit" class="btn btn-success mx-2" name="Train">Train</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Section -->
    <div class="card w-100">
        <div class="card-body">
            <h5 class="text-center">Training Evaluation Results</h5>
            <textarea class="form-control area-results" readonly><?php echo "Mean Squared Error (MSE): $mse\nMean Absolute Error (MAE): $mae\nR-squared (R²): $r2"; ?></textarea>
        </div>
    </div>
</main>

    <!-- main content end -->

    <!-- FOOTER Section Start -->
    <?php include 'footer.php'; ?>
    <!-- FOOTER Section End -->


    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src = "script/loadingscreen.js"></script>
</body>

</html>