<?php
$form = new Form();

  if (isset($errors['login'])) {echo $errors['login'];}
  $form->formOpen($_SERVER['PHP_SELF'], 'POST');
  $form->label('usernameOrEmail', 'Username or email:');
  $form->text('usernameOrEmail');
  if (isset($errors['username'])) {echo $errors['username'];}
  echo '<br>';
  $form->label('password', 'Password:');
  $form->openTag("input", "type=password name=password");
  if (isset($errors['password'])) {echo $errors['password'];}
  echo '<br>';
  $form->submit('submit', 'Confirm');
  $form->formClose();

  $form->formOpen($_SERVER['PHP_SELF']."?action=registration", 'POST');
  $form->submit('registerScreen', "Go to register");
  $form->formClose();
  ?>
