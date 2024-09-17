<?php

session_start();
$_SESSION["date"] = isset($_SESSION["date"]) ? $_SESSION["date"] : date('Y-m-d'); // Ensure session date is initialized

# Weather API
$latitude = "14.5243"; // Latitude for Taguig
$longitude = "121.0792"; // Longitude for Taguig
$timezone = "Asia/Singapore"; // Timezone for Taguig

// API URL for 7-Day Forecast including humidity
$apiUrl = "https://api.open-meteo.com/v1/forecast?latitude={$latitude}&longitude={$longitude}&daily=weather_code,temperature_2m_max,temperature_2m_min,relative_humidity_2m_max,relative_humidity_2m_min,wind_speed_10m_max,wind_direction_10m_dominant&timezone={$timezone}";

// Fetch weather data from the API
$weatherData = @file_get_contents($apiUrl);

if ($weatherData === FALSE) {
    echo "Error fetching weather data. Please check the URL.";
    exit;
}

$weatherArray = json_decode($weatherData, true);

if (isset($weatherArray['daily'])) {
    $dailyData = $weatherArray['daily'];
    $dates = $dailyData['time'];
    $temperatureMax = $dailyData['temperature_2m_max'];
    $temperatureMin = $dailyData['temperature_2m_min'];
    $humidityMax = $dailyData['relative_humidity_2m_max'];
    $humidityMin = $dailyData['relative_humidity_2m_min'];
    $windSpeedMax = $dailyData['wind_speed_10m_max'];
    $windDirectionDominant = $dailyData['wind_direction_10m_dominant'];
    $weatherCode = $dailyData['weather_code'];

    // Default to show tomorrow's data
    if (isset($_GET['date']) && in_array($_GET['date'], $dates)) {
        $selectedDate = $_GET['date'];
        $_SESSION["date"] = $selectedDate;
    } else {
        $selectedDate = $_SESSION["date"];
    }


    // Find index for the selected date
    $index = array_search($selectedDate, $dates);

    if ($index !== false) {
        echo "<div style='position: absolute; bottom: 200px; right: 50px; width: 550px; border: 1px solid green; padding: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);'>";
        // Display weather data for the selected date
        echo "<h2 style='color: black; text-align: center; font-size: 1.2em;'>Weather Forecast for {$selectedDate}</h2>";
        echo "<table style='width: 100%; border-collapse: collapse;'>";
        echo "<tr style='background-color: #e0f7e0;'>";
        echo "<th style='border: 1px solid green; padding: 5px;'>Weather Code</th>";
        echo "<th style='border: 1px solid green; padding: 5px;'>Max Temp (°C)</th>";
        echo "<th style='border: 1px solid green; padding: 5px;'>Min Temp (°C)</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td style='border: 1px solid green; padding: 5px;'>{$weatherCode[$index]}</td>";
        echo "<td style='border: 1px solid green; padding: 5px;'>{$temperatureMax[$index]}</td>";
        echo "<td style='border: 1px solid green; padding: 5px;'>{$temperatureMin[$index]}</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th style='border: 1px solid green; padding: 5px;'>Max Humidity (%)</th>";
        echo "<th style='border: 1px solid green; padding: 5px;'>Min Humidity (%)</th>";
        echo "<th style='border: 1px solid green; padding: 5px;'>Max Wind (m/s)</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td style='border: 1px solid green; padding: 5px;'>{$humidityMax[$index]}</td>";
        echo "<td style='border: 1px solid green; padding: 5px;'>{$humidityMin[$index]}</td>";
        echo "<td style='border: 1px solid green; padding: 5px;'>{$windSpeedMax[$index]}</td>";
        echo "</tr>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div style='position: fixed; bottom: 20px; right: 20px; width: 300px; background-color: #fff0f0; border: 1px solid red; padding: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);'>";
        echo "<p style='color: red; text-align: center;'>Data for the selected date is not available.</p>";
        echo "</div>";
    }
    
} else {
    echo "Unable to fetch weather data.";
}

// Handle Flask API request and response
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $results = [];

    $data = [
        'Temperature' => [floatval($temperatureMax[$index])],
        'Humidity' => [floatval($humidityMax[$index])],
        'Wind Speed' => [floatval($windSpeedMax[$index])],
        'Date' => $_SESSION["date"],
    ];

    $json_data = json_encode($data);

    $url = 'http://127.0.0.1:5000/predict_and_learn';  // Flask API URL
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    curl_close($ch);

    // Decode the JSON response from the Flask API
    $response = json_decode($result, true);

    if (isset($response['status']) && $response['status'] == 'Error') {
        $error_message = $response['message'];
        $results['error_message'] = $error_message;
    } else {
        $results['status'] = $response['status'];
        $results['predictions'] = $response['results'];
    }
}

$phyto = [];

if (isset($results)) {
    if (isset($results['error_message'])) {
        echo "Error: " . $results['error_message'] . "\n";
    } else {
        foreach ($results['predictions'] as $station_name => $result) {
            #echo "Results for " . $station_name . "\n";
            #echo "Predicted Phytoplankton Count (cells/ml): " . $result['prediction'][0] . "\n";
            $phyto[$station_name] = $result['prediction'][0]; // Store predictions by station name
            #echo "Forecast:\n";
            foreach ($result['forecast'] as $key => $value) {
                #echo $key . ": " . $value . "\n";
            }
        }
    }
} else {
    
}






?>