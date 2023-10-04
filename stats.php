<?php
require("classes/DataBase.php");

$db = new Database();
$db->conn->select_db("ecarstrade");

$averageMileageQuery = "SELECT AVG(mileage) AS average_mileage FROM cars";
$averageMileageResult = $db->conn->query($averageMileageQuery);
$averageMileage = $averageMileageResult->fetch_assoc()['average_mileage'];

$topCountriesQuery = "SELECT country_of_origin, COUNT(*) AS car_count
                     FROM cars
                     GROUP BY country_of_origin
                     ORDER BY car_count DESC
                     LIMIT 3";
$topCountriesResult = $db->conn->query($topCountriesQuery);
$topCountries = [];
while ($row = $topCountriesResult->fetch_assoc()) {
    $topCountries[] = $row;
}

$powerQuery = "SELECT MAX(power_kw) AS max_power_hp, MIN(power_kw) AS min_power_hp,
               MAX(power_kw * 1.34102) AS max_power_kw, MIN(power_kw * 1.34102) AS min_power_kw
               FROM cars";
$powerResult = $db->conn->query($powerQuery);
$powerData = $powerResult->fetch_assoc();

$gearboxQuery = "SELECT DISTINCT gearbox FROM cars";
$gearboxResult = $db->conn->query($gearboxQuery);
$gearboxOptions = [];
while ($row = $gearboxResult->fetch_assoc()) {
    $gearboxOptions[] = $row['gearbox'];
}

$fuelQuery = "SELECT DISTINCT fuel FROM cars";
$fuelResult = $db->conn->query($fuelQuery);
$fuelOptions = [];
while ($row = $fuelResult->fetch_assoc()) {
    $fuelOptions[] = $row['fuel'];
}


$resultArray = [
    'average_mileage' => $averageMileage,
    'top_countries' => $topCountries,
    'max_min_power' => $powerData,
    'gearbox_options' => $gearboxOptions,
    'fuel_options' => $fuelOptions,
];

header('Content-Type: application/json');
echo json_encode($resultArray);