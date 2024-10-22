<?php
// Read weather data from JSON file
$jsonData = file_get_contents('weather.json');
$weather = json_decode($jsonData, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Weather in <?= $weather['city']; ?></h1>
        <p>Country: <?= $weather['country']; ?></p>
        <p>Coordinates: <?= $weather['coordinates']['latitude']; ?>, <?= $weather['coordinates']['longitude']; ?></p>

        <div class="weather-info">
            <p><strong>Current Temperature:</strong> <?= $weather['temperature']['current']; ?> °C</p>
            <p><strong>Feels Like:</strong> <?= $weather['temperature']['feels_like']; ?> °C</p>
            <p><strong>Weather:</strong> <?= $weather['weather'][0]['description']; ?></p>
            <p><strong>Humidity:</strong> <?= $weather['humidity']; ?>%</p>
            <p><strong>Wind Speed:</strong> <?= $weather['wind']['speed']; ?> m/s</p>
        </div>

        <h2>3-Day Forecast</h2>
        <div class="forecast">
            <?php foreach ($weather['forecast'] as $day): ?>
                <div class="forecast-day">
                    <h3><?= $day['day']; ?></h3>
                    <p>Min: <?= $day['temperature']['min']; ?> °C</p>
                    <p>Max: <?= $day['temperature']['max']; ?> °C</p>
                    <p><?= $day['description']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
