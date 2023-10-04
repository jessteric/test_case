<?php
require_once('classes/DataBase.php');
require_once('classes/Main.php');

$db = new Database;
$arrayObject = new Main();
$db->createTable();
foreach ($arrayObject->getAllData() as $car) {
    $title = $db->conn->real_escape_string($car['title']);
    $markAndModel = $db->conn->real_escape_string($car['mark']);
    $firstRegistrationDate = $car["first_register_date"];
    $mileage = $db->conn->real_escape_string($car['mileage']);
    $gearbox = $db->conn->real_escape_string($car['gearbox']);
    $fuel = $db->conn->real_escape_string($car['fuel']);
    $engineSize = $car['engine_size'];
    $powerKw = $car['power_hp'];
    $powerHp = $car['power_hp'];
    $emissionClass = $db->conn->real_escape_string($car['emission_class']);
    $co2Value = $car['co2'];
    $countryOfOrigin = $db->conn->real_escape_string($car['country_origin']);

    $insert = "INSERT INTO cars (title, mark_and_model, first_registration_date, mileage, gearbox, fuel, engine_size, power_kw, power_hp, emission_class, co2_value, country_of_origin)
                    VALUES ('$title', '$markAndModel', '$firstRegistrationDate', $mileage, '$gearbox', '$fuel', '$engineSize', $powerKw, $powerHp, '$emissionClass', $co2Value, '$countryOfOrigin')";
    // echo $insert; die();
    $db->conn->select_db("ecarstrade");
    if ($db->conn->query($insert) === TRUE) {
        echo "Successfully add.<br>";
    } else {
        echo "We have error: " . $db->conn->error;
    }
}


