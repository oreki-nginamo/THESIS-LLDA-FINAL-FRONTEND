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

</head>

<body>

    <!-- HEADER nav bar start -->
    <?php include 'header.php'; ?>
    <!-- HEADER nav bar end -->

    <!-- main content start -->
    <main>
        <div>



            <h1 class="pred_h1">Prediction</h1>

            <div class="table-container">
                <table>
                    <tr>
                        <th>Temperature</th>
                        <th>Humidity</th>
                        <th>Wind Speed</th>
                        <th>pH (units)</th>
                        <th>Ammonia (mg/L)</th>
                        <th>Inorganic Phosphate (mg/L)</th>
                        <th>BOD (mg/l)</th>
                        <th>Total coliforms (MPN/100ml)</th>
                        <th></th>
                        <th></th>
                        <th>Phytoplankton (cells/ml)</th>
                    </tr>

                    <tr>
                        <form action="prediction_MI.php" method="POST">
                            <td><input class="pred_input" type="text" name="temperature" required></td>
                            <td><input class="pred_input" type="text" name="humidity" required></td>
                            <td><input class="pred_input" type="text" name="wind_speed" required></td>
                            <td><input class="pred_input" type="text" name="ph" required></td>
                            <td><input class="pred_input" type="text" name="ammonia" required></td>
                            <td><input class="pred_input" type="text" name="phosphate" required></td>
                            <td><input class="pred_input" type="text" name="bod"></td>
                            <td><input class="pred_input" type="text" name="coliforms"></td>
                            <td><input type="submit" value="Predict" name="submit_flask"></td>
                            <td><input type="reset" value="Reset" name="reset_flask"></td>
                            <td><input class="pred_input" type="text" value="<?php echo $rounded; ?>"></td>
                        </form>

                    </tr>
                </table>
            </div>



            <h1 class="pred_h1">Model Testing/Retraining</h1>
            <p class="model_p"><sup>This is used for uploading new datasets or retraing model with the current
                    dataset</sup></p>

            <div class="ML">
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <label>Upload Dataset (CSV Only): </label>
                    <input type="file" name="dataset" accept=".csv" required>
                    <input type="submit" value="Upload">
                </form>

                <label for="dataset">Datasets Available</label>

                <form class="train-form" action="" method="POST">
                    <select name="selected_dataset" id="dataset">
                        <option value="">Select a Dataset</option>

                        <?php
                        // Define the folder path
                        $folderPath = 'C:/Users/John Wilson/Desktop/Datamodel';  // Change this to the correct folder
                        
                        // Check if the directory exists
                        if (is_dir($folderPath)) {
                            // Open the folder
                            if ($folderHandle = opendir($folderPath)) {
                                // Read through the files in the folder
                                while (($file = readdir($folderHandle)) !== false) {
                                    // Only display files (ignore . and .. directories)
                                    if ($file != '.' && $file != '..' && !is_dir($folderPath . '/' . $file)) {
                                        // Only show files with specific extensions (e.g., .csv or .txt)
                                        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
                                        if ($fileExtension == 'csv' || $fileExtension == 'txt') {
                                            echo "<option value=\"$file\">$file</option>";
                                        }
                                    }
                                }
                                // Close the directory handle
                                closedir($folderHandle);
                            } else {
                                echo "<option value=''>Unable to open directory</option>";
                            }
                        } else {
                            echo "<option value=''>Folder does not exist</option>";
                        }
                        ?>

                    </select>
                    <input type="submit" value="Preview" name="Retrain">
                    <input type="submit" value="Train" name="Train">
                </form>

            </div>

            <div class="results">

                <p>Training Evaluation Results</p>
                <textarea class="area-results">
<?php
echo "Mean Squared Error (MSE): $mse";
echo "Mean Absolute Error (MAE): $mae";
echo "R-squared (R²): $r2";
?>

</textarea>

            </div>
    </main>
    <!-- main content end -->

    <!-- FOOTER Section Start -->
    <?php include 'footer.php'; ?>
    <!-- FOOTER Section End -->


    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>