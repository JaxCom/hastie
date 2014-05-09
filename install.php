<?php

/**
 * This is the installation file for the 0-one-file version of the php-login script.
 * It simply creates a new and empty database.
 */
//Generate password
function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}
$randomstring = rand_string( 10 );
$defaultpass = password_hash($randomstring, PASSWORD_DEFAULT);

// error reporting config
error_reporting(E_ALL);

// config
$db_type = "sqlite";
$db_sqlite_path = "../users.db";

// create new database file / connection (the file will be automatically created the first time a connection is made up)
$db_connection = new PDO($db_type . ':' . $db_sqlite_path);

// create new empty table inside the database (if table does not already exist)
$sql = 'CREATE TABLE IF NOT EXISTS `users3` (
        `user_id` INTEGER PRIMARY KEY,
        `user_name` varchar(64),
        `user_password_hash` varchar(255),
        `user_email` varchar(64),
        `real_name` varchar(255));
        CREATE UNIQUE INDEX `user_name_UNIQUE` ON `users3` (`user_name` ASC);
        CREATE UNIQUE INDEX `user_email_UNIQUE` ON `users3` (`user_email` ASC);
        ';
$newadmin = 'INSERT INTO `users3` (`user_name`,`user_password_hash`) VALUES ("admin","'.$defaultpass.'"); ';

// execute the above query
$query = $db_connection->prepare($sql);
$query->execute();

$query2 = $db_connection->prepare($newadmin);
$query2->execute();


// check for success
if (file_exists($db_sqlite_path)) {
    echo "Database $db_sqlite_path was created, installation was successful.<br>";
    echo "Delete the '_installation' directory NOW! <br>";
    echo "You may log in with the username 'admin', and the password '".$randomstring."' (without quotes) \n";
} else {
    echo "Database $db_sqlite_path was not created, installation was NOT successful. Missing folder write rights ?";
}
