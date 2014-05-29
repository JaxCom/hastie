<!DOCTYPE html>
<?php
include('includes/header.php');
userLoginChecker();

?>
	<!-- markItUp! skin -->
	<link rel="stylesheet" type="text/css" href="/markitup/skins/markitup/style.css">
	<!--  markItUp! toolbar skin -->
	<link rel="stylesheet" type="text/css" href="/markitup/sets/markdown/style.css" />
	<!-- markItUp! -->
	<script type="text/javascript" src="/markitup/jquery.markitup.js"></script>
	<!-- markItUp! toolbar settings -->
	<script type="text/javascript" src="/markitup/sets/markdown/set.js"></script>

<?php  

if($_GET['action'] == "index") {
echo '<div class="col-7 col-sm-12 col-md-7 col-lg-7 col-centered">
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Select a Post to Edit</h3>
  </div>
  <div class="panel-body">';
foreach (new DirectoryIterator($postsDirectory) as $fileInfo) {
    if($fileInfo->isDot()) continue;
    echo "<a href='/editpost/".$fileInfo->getBasename('.markdown')."'>".$fileInfo->getBasename('.markdown') . "</a><br>\n";
}
echo '</div>

</div><!--panel-->';
}


if ($_GET['action'] == "edit") {
$current = $_GET['file'];
$editfile = file_get_contents($postsDirectory.$current);
echo "<div class='row'><div class='col-md-8'>";
echo "<form class='form form-horizontal' method='post' action='edit/push'>";
echo "<input type='hidden' name='filetopush' value='".$current."'>";
echo '<div class="form-group"><div class="col-12 col-sm-12 col-md-12 col-lg-12"><button class="btn btn-success btn-large pull-right" type="submit"  name="edit" value="Edit" />Submit Edit</button><a class="btn btn-info btn-large pull-left" href="/edit/index" />Back to Posts</a><a class="btn btn-warning btn-large pull-left" href="/action/create" />New Post</a></div></div>';
echo "<div class='form-group'>";
echo "<textarea id='markdown' name='newconts' class='form-control' rows='25'>".$editfile."</textarea></div>";

echo "</form></div>";
echo "<div class='col-md-4 col-lg-4 col-4'>";
echo "<div class='well'>Tips and tricks</div>";
echo "</div></div>";
}

if ($_GET['action'] == "push") {
include_once "includes/markdown.php";
$pushfile = $_POST['filetopush'];
$pushconts = $_POST['newconts'];
$postpath = $postsDirectory.$pushfile;
if(!file_put_contents($postpath, $pushconts)) {
print 'Error';
}
else {
echo '<div class="col-7 col-sm-12 col-md-7 col-lg-7 col-centered">
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Post Creation Status</h3>
  </div>
  <div class="panel-body">';
echo "Your edit was saved successfully.<br>Click the Publish button below to push your content to your site.";

echo '</div>
<div class="panel-footer">

<a class="btn btn-success btn-large pull-right" href="/action_publish"><i class="fa fa-angle-double-right"></i> Publish Post</a>
<div class="clearfix">
</div>
</div><!--footer-->
</div><!--panel-->';
}

//echo $pushconts;
}
include('includes/footer.php');
?>
<script language="javascript">
$(document).ready(function()	{
    $('#markdown').markItUp(myMarkdownSettings);
});
</script>
