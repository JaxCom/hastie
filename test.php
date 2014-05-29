<!DOCTYPE html>
<?php
include('includes/header.php');
include('includes/config.php');

userLoginChecker();
include('includes/dbwrapper.php');
$pass = "1234";
$hash = password_hash($pass, PASSWORD_DEFAULT);
echo $hash;

$bees = "1234";
if (password_verify($bees, $hash)) {
echo "true";
} else {
echo "false";
}
?>
