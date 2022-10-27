<?php
require "Vehicle.php";
require "Car.php";



$blueCar = new Car('blue', 5, 'benzine');

$blueCar->setParkBrake(false);
$mess = "";
try {
    $mess = $blueCar->start();
} catch (Exception $err) {
    $mess = $err->getMessage();
} finally {
    echo "atempt to start the blue car : " . $mess . "<br>";
}
echo " Set The brake park<br>";
$blueCar->setParkBrake(true);
try {
    $mess = $blueCar->back();
} catch (Exception $err) {
    $mess = $err->getMessage();
} finally {
    echo "atempt to go back with the blue car : " . $mess . "<br>";
}
