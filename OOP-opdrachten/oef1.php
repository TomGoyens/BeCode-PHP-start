<?php
require 'Html.php';
require 'Form.php';
require 'Validator.php';
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
    <?php $form = new Form();
    $form->formOpen('POST');
    $form->text('name');
    echo '<br>';
    $form->text('firstname');
    echo '<br>';
    $form->select(['option1', "option2", "option3"]);
    echo '<br>';
    $form->radio('check', ['option1', "option2", "option3"]);
    echo '<br>';
    $form->checkbox('box', 'werkt?');
    echo '<br>';
    $form->submit('submit', 'Confirm');
    $form->formClose();
    $html->img('https://picsum.photos/200/300','random image');
    echo '<br>';
    $html->link('https://picsum.photos/200/300', 'image');
    echo '<br>';
    $html->script('assets/js/main.js');
    ?>
    <?php
    $validate = new Validator;
    echo $validate->mailCheck("tom@mail");
    ?>
  </body>
</html>
