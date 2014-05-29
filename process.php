<?php
include('includes/header.php');
userLoginChecker();


include_once "includes/markdown.php";

//Get user submitted title
$rawTitle = $_POST['title'];

//Get category and tags
	$postCat = $_POST['category'];
	if ($_POST['tags'] != NULL) {
	$postTags = $_POST['tags'];
	$tagCloud = implode(" ", $postTags);
	}
	else {
	echo "no tags";
	}

//Process title in various ways
//Hacked together, clean up someday
$escapedTitle = addslashes($rawTitle); //unused
$postDate = date('Y-m-d H:i:s'); //published date
$fileDate = date('Y-m-d'); //date for file name
$dashedTitle = str_replace(" ", "-", $rawTitle); //replace spaces in title with dashes
$processedTitle = str_replace("'", "", $dashedTitle); //remove ' in title
$postTitle = $fileDate."-".$processedTitle; //combine date and processed title
$text = $_POST['newpost']; //user submitted post
$rawText = nl2br($text); //process line breaks
$processedText=Markdown($_POST['newpost']); 
$almostFinishedText = str_replace("<br /><br />", "\n", $rawText);
$finishedText = str_replace("<br />", "", $almostFinishedText);
?>
<div class="row">
<div class="col-7 col-sm-12 col-md-7 col-lg-7 col-centered">
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Post Creation Status</h3>
  </div>
  <div class="panel-body">
<?php
//create file name from post title
$filename = $postsDirectory.$postTitle.'.markdown';
$handle = fopen($filename, 'w') or die('Cannot write to file:  '.$filename); //create file

//Create the frontend yaml
$startyaml = '---';
fwrite($handle, $startyaml);
$layout = "\n".'layout: post';
fwrite($handle, $layout);
$yamltitle = "\n"."title: ".$rawTitle;
fwrite($handle, $yamltitle);
$yamldate = "\n"."date: ".$postDate;
fwrite($handle, $yamldate);
$yamlcat = "\n"."categories: ".$postCat;
fwrite($handle, $yamlcat);
$yamltags = "\n"."tags: ".$tagCloud;
fwrite($handle, $yamltags);
$yamlauthor = "\n"."author: ".$_SESSION['real_name'];
fwrite($handle, $yamlauthor);
$yamlthumb = "\n"."thumb: ";
fwrite($handle, $yamlthumb);
$endyaml = "\n".'---'."\n";
fwrite($handle, $endyaml);

//Insert the post content
if (fwrite($handle, $finishedText) === FALSE) {
	echo "Cannot write to file ".$postTitle.".markdown";
	exit;
}
echo "Successfully wrote your post,<br><b><i>".$rawTitle."</i></b><br> to the posts directory as: <i><b><br>".$postTitle.".markdown</i></b><br>Click the Publish button below to push your content to your site.";
?>
</div>
<div class="panel-footer">

<a class="btn btn-success btn-large pull-right" href="/action/publish"><i class="fa fa-angle-double-right"></i> Publish Post</a>
<div class="clearfix">
</div>
</div><!--footer-->
</div><!--panel-->
</div><!--size-->
</div>
<div class="row">
<hr>
<?php

//Echo the raw markdown
echo "Below is the raw markdown version of your post: <br>";
echo '<div class="well well-sm">';
echo $rawText;
echo "</div>";
echo "<hr>";
//Echo preview version
echo "Below is a preview version of your published post: <br>";
echo '<div class="well well-sm">';
echo $processedText;
echo "</div></div>";
include('includes/footer.php');
?>

