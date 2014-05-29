<!DOCTYPE html>
<?php
include('includes/header.php');
include('includes/config.php');

userLoginChecker();
include('includes/dbwrapper.php');
if ($_GET['action'] == "addtag")
{
$tagToAdd = $_POST['newtag'];
$insertTag = new Database();
$insertTag->query('INSERT INTO tags (name) VALUES (:newtag)');
$insertTag->bind(':newtag', $tagToAdd);
$insertTag->execute();
$insertTag->closeConn();
}
if ($_GET['action'] == "removetag")
{
$tagToRemove = $_POST['deltag'];
$insertTag = new Database();
$insertTag->query('DELETE FROM tags WHERE id = :deltag');
$insertTag->bind(':deltag', $tagToRemove);
$insertTag->execute();
$insertTag->closeConn();
}
?>
<legend>Available Tags</legend>
<div class="well">
<?php

$dbconn = new Database();
$dbconn->query('SELECT * FROM tags');
$availTags = $dbconn->resultSet();

foreach ($availTags as $tag) {
	echo "<span class='label label-info'>".$tag['name']."</span> ";
}
$dbconn->closeConn();
?>
</div>
<form class="form-horizontal" action="/manage-tags/addtag" method="post">
<fieldset>

<!-- Form Name -->
<legend>Add Tag</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Tag </label>  
  <div class="col-md-4">
  <input id="newtag" name="newtag" type="text" placeholder="your-new-tag" class="form-control input-md">
  <span class="help-block">(use - instead of space)</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">

  <div class="col-md-4 pull-right">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Add</button>
  </div>
</div>

</fieldset>
</form>
<form class="form-horizontal" action="/manage-tags/removetag" method="post">
<fieldset>

<!-- Form Name -->
<legend>Remove Tag</legend>
<div class="form-group">
<!-- Text input-->
  <label class="col-md-4 control-label" for="textinput">Tag </label>  
  <div class="col-md-4 center-block">
<select class="form-control" name="deltag">
  <option value="" disabled selected>Select Tag:</option>
<?php

$listTags = new Database();
$listTags->query('SELECT * FROM tags');
$availTags = $listTags->resultSet();

foreach ($availTags as $tag) {
	echo "<option value='".$tag['id']."'>".$tag['name']."</option> ";
}
$listTags->closeConn();
?>


</select>
</div>
</div>

<!-- Button -->
<div class="form-group">

  <div class="col-md-4 pull-right">
    <button id="singlebutton" name="singlebutton" class="btn btn-danger">Remove</button>
  </div>
</div>

</fieldset>
</form>
<?php include('footer.php'); ?>
