<!doctype html>
<html>
<head>
    <title>Weather Search</title>
    <style>
        body {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 3/4/14
 * Time: 3:31 PM
 */
$city = $data->city->name;
$currentTemperature = toF($data->list[0]->main->temp);
$high = toF($data->list[0]->main->temp_max);
$low = toF($data->list[0]->main->temp_min);
$description = $data->list[0]->weather[0]->description;

function toF($kelvin) {
    return (float)(1.8)*($kelvin-273.15)+32;
}

echo "<h1>Weather of $city</h1>";

echo "<h3>Today's Temperature is: $currentTemperature</h3>";
echo "<h4>High: $high</h4>";
echo "<h4>Low: $low</h4>";
echo "<h4>It is: $description today";
?>