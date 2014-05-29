<?php

function userLoginChecker()
{
if (!isset($_SESSION['user_is_logged_in']) || $_SESSION['user_is_logged_in'] === FALSE) {
header("Location: /user_login"); /* Redirect browser */
}
}
?>
