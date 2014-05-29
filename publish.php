<?php
include('includes/header.php');
userLoginChecker();



//Build command for site content
$buildcmd = 'jekyll build -s '.$sourcedir.' -d '.$webroot.' 2>&1';

// Outputs all the result of build command, and returns
// the last output line into $last_line. Stores the return value
// of the shell command in $retval.
$last_line = exec($buildcmd,$output,$retval);

// Checks $retval and displays status message
if ($retval == "0") {
	include('includes/publish_success.php');
}
else {
	include('includes/publish_error.php');
}
// Printing additional info

echo '
</pre>
<hr />Technical Information:<br>Last line of the output: ' . $last_line . '
<hr />Return value: ' . $retval;

include('includes/footer.php'); 
?>
