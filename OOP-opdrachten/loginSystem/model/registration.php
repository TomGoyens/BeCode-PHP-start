<?php

$database = new Database;
$db = $database->connect("OOP_opdr");
$table = $database->getTable();
$validate = new Validator;
$user = new User($database);
$errors = array();
// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['passwordConfirm']);

  if (empty($username)) {  $errors['username'] = true; }
  if (empty($email)) {  $errors['email'] = true; }
  if (empty($password_1)) {  $errors['password'] = true; }
  if ($password_1 != $password_2) {
	   $errors['password2'] = true;
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = $db->prepare("SELECT * FROM $table WHERE username=? OR email=? LIMIT 1");
  $user_check_query->bind_param("ss", $username, $email);
  $user_check_query->execute();
  $result = $user_check_query->get_result();
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      $errors['usernameTaken'] = true;
    }

    if ($user['email'] === $email) {
      $errors['emailTaken'] = true;
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	// $password = md5($password_1);//encrypt the password before saving in the database
    echo 'test';
    echo $username;
    echo $email;
    echo $password_1;
  	$query = $db->prepare("INSERT INTO $table (username, email, password)
  			  VALUES(?, ?, ?)");
    $query->bind_param("sss", $username, $email, $password_1);
    if ($query->execute()){ echo 'ye';}
  	$_SESSION['user'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: '.BASE_URL.'?action=success');
  }
}

require VIEW.'/registration_view.php';
