<?php
require 'Html.php';
require 'Car.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php $html = new Html;
    $html->css('assets/css/main.css');
    $html->meta();
    $html->title('OOP oef2');
    ?>
  </head>
  <body>
    <?php
    $audi = new Car("BE4", "01-03-1989", 1000000, "A3", "Audi", "blue", 0.9);
    echo $audi->weightClass();
    echo '<br>';
    echo $audi->availability();
    echo '<br>';
    echo $audi->CountryOfOrigin();
    echo '<br>';
    echo $audi->vehicleState();
    echo '<br>';
    echo $audi->age();
    echo '<br>';
    $audi->display();
    ?>
  </body>
</html>
