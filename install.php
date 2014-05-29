<html>
<head>
<title>Hastie Publishing Center | Install</title>
<link rel="stylesheet" href="http://bootswatch.com/spacelab/bootstrap.min.css">
<link rel="stylesheet" href="includes/styles.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<!-- jQuery -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<form class="form form-horizontal" method="post" action="install.php?action=install">
<div class="form-group">
<input class="form-control" type="text" placeholder="your name" name="realname>
</div>
<div class="form-group">
<input class="form-control" type="password" name="password">
</div>
<div class="form-group">
<input type="checkbox" value="randyes" name="randyes">Random Password
</div>
<div class="form-group">
<button type="submit" class="btn btn-success btn-large">Continue</button>
</div>
</form>

</div>
<?php
if ($_GET['action'] == "test") {
var_dump($_POST);
}
if ($_GET['action'] == "install") {
$realname = $_POST['realname'];

/**
 * This is the installation file for the 0-one-file version of the php-login script.
 * It simply creates a new and empty database.
 */
//Generate password
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
$randomstring = generateRandomString();
//print_r($randomstring);
if (isset($_POST['randyes'])) {
$defaultpass = password_hash($randomstring, PASSWORD_DEFAULT);
}
else {
$defaultpass = password_hash($_POST['password'], PASSWORD_DEFAULT);
}

// error reporting config
error_reporting(E_ALL);

// config
$db_type = "sqlite";
$db_sqlite_path = "./test.db";

// create new database file / connection (the file will be automatically created the first time a connection is made up)
$db_connection = new PDO($db_type . ':' . $db_sqlite_path);

// create new empty table inside the database (if table does not already exist)
$sql = 'CREATE TABLE IF NOT EXISTS `users` (
        `user_id` INTEGER PRIMARY KEY,
        `user_name` varchar(64),
        `user_password_hash` varchar(255),
        `user_email` varchar(64),
        `real_name` varchar(255));
        CREATE UNIQUE INDEX `user_name_UNIQUE` ON `users` (`user_name` ASC);
        CREATE UNIQUE INDEX `user_email_UNIQUE` ON `users` (`user_email` ASC);
        ';
$newadmin = 'INSERT INTO `users` (`user_name`,`real_name`,`user_password_hash`) VALUES ("admin","'.$realname.'","'.$defaultpass.'"); ';
$makeTagsTable = 'CREATE TABLE tags(`id` integer primary key autoincrement,`name` varchar(50));';
$makeCatsTable = 'CREATE TABLE categories(`id` integer primary key autoincrement,`name` varchar(50), `description` varchar(50));';
// execute the above query
$query = $db_connection->prepare($sql);
$query->execute();

$query2 = $db_connection->prepare($newadmin);
$query2->execute();

$tagsTableSql = $db_connection->prepare($makeTagsTable);
$tagsTableSql->execute();

$catsTableSql = $db_connection->prepare($makeCatsTable);
$catsTableSql->execute();


// check for success
if (file_exists($db_sqlite_path)) {
    echo "Database $db_sqlite_path was created, installation was successful.<br>";
    echo "Delete the file 'install.php' directory NOW! <br>";
    echo "You may log in with the username 'admin', and the password '".$defaultpass."' (without quotes) \n";
} else {
    echo "Database $db_sqlite_path was not created, installation was NOT successful. Missing folder write rights ?";
}

}
