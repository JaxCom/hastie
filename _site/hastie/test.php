<head>
<title>Publishing Center |</title>
<link rel="stylesheet" href="http://bootswatch.com/spacelab/bootstrap.min.css">
<link rel="stylesheet" href="includes/styles.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<!-- jQuery -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head><body>
<!--
<form class="form-horizontal" action="/test.php" method="post" role="form">
<div class="form-group">
<input type="hidden" value="subbed" name="sub">

</div>
<div class="form-group">
<select class="form-control" name="category">
  <option value="" disabled selected>Select a Post Type </option>
  <option value="news">News/Blog Post</option>
  <option value="events">Event Listing</option>
</select>
</div>
<div class="form-group">
<select multiple class="form-control" name="tags[]">
  <option value="addison-mizner">addison-mizner</option>
  <option value="lecture">lecture</option>
  <option value="free-event">free-event</option>

</select>
</div>
<div class="form-group pull-right">
<button class="btn btn-success btn-large" type="submit" value="Submit">Submit</button>
</div>
</form>
<?php
if (isset($_POST['sub'])) {
	$postCat = $_POST['category'];
	if ($_POST['tags'] != NULL) {
	$postTags = $_POST['tags'];
	$tagcloud = implode(" ", $postTags);
	}
	else {
	echo "no tags";
	}

echo $postCat."<br>";
echo $tagcloud;

/*
foreach ($postTags as $tagarray) {
echo $tagarray;
} 
echo "<br>";

echo $tagcloud;
echo "<br>";
print_r($postTags);
echo "<br>";
var_dump($postTags);
*/

}
?>
-->

<?php
$dir = '/var/www/flica/_posts';
$files = scandir($dir);
$editfile = file_get_contents($dir.'/test.markdown');

//$conts=yaml_parse($editfile);
//print_r($editfile);
echo "<textarea cols='140' rows='30'>".$editfile."</textarea><Br>";
foreach($files as $post) {

echo '<a href="#">'.$post.'</a><br>';
}
?>
