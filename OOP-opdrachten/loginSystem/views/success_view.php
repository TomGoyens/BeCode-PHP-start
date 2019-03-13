<?php
// echo 'hello '.json_encode($_SESSION['user'], JSON_PRETTY_PRINT);
echo $_SESSION['user'];
$form = new Form();

$form->formOpen($_SERVER['PHP_SELF']."?action=loginOut", 'POST');
$form->submit('logout', 'Log out');
$form->formClose();
