<?php
require 'Html.php';
require 'Form.php';
require 'Validator.php';
require 'Database.php';
$database = new Database;
$database->connect();
session_start();


if (isset($_POST['registerScreen'])){
  $_SESSION['register'] = true;
} elseif (isset($_POST['loginScreen'])){
  $_SESSION['register'] = false;
}
echo $_SESSION['register'];
$validate = new Validator;
// if (isset($_POST['email'])){
//   $database->
// }


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php $html = new Html;
    $html->css('assets/css/main.css');
    $html->meta();
    $html->title('OOP oef1');
    ?>
  </head>
  <body>
    <?php
    if (isset($_SESSION['user'])){
        echo 'Hello '.$_SESSION['user'];
    } elseif ($_SESSION['register'] == true){
      require 'registerForm.php';
    } elseif ($_SESSION['register'] == false){
      require 'loginForm.php';
    }
    ?>
  </body>
</html>
