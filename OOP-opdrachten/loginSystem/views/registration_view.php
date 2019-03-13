<?php
$form = new Form();

  $form->formOpen($_SERVER['PHP_SELF']."?action=registration", 'POST');
  $form->label('username', 'Username:');
  $form->text('username');
  if (isset($errors['username'])) {echo "Username is required.";}
  if (isset($errors['usernameTaken'])) {echo "Username is taken.";}
  echo '<br>';
  $form->label('email', 'E-mail:');
  $form->text('email');
  if (isset($errors['email'])) {echo "Email is required.";}
  if (isset($errors['emailTaken'])) {echo "Email is taken.";}
  echo '<br>';
  $form->label('password', 'Password:');
  $form->openTag("input", "type=password name=password");
  if (isset($errors['password'])) {echo 'Password is required.';}
  echo '<br>';
  $form->label('passwordConfirm', 'Confirm Password:');
  $form->openTag("input", "type=password name=passwordConfirm");
  if (isset($errors['password2'])) {echo 'Passwords must match.';}
  echo '<br>';
  $form->submit('register', 'Confirm');
  $form->formClose();

  ?>
