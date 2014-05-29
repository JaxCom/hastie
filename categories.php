<!DOCTYPE html>
<?php
include('includes/header.php');
include('includes/config.php');

userLoginChecker();
include('includes/dbwrapper.php');
if ($_GET['action'] == "addcat")
{
$catToAdd = $_POST['newcat'];
$insertCat = new Database();
$insertCat->query('INSERT INTO categories (name) VALUES (:newcat)');
$insertCat->bind(':newcat', $catToAdd);
$insertCat->execute();
$insertCat->closeConn();
}
if ($_GET['action'] == "removecat")
{
$catToRemove = $_POST['delcat'];
$rmvCat = new Database();
$rmvCat->query('DELETE FROM categories WHERE id = :delcat');
$rmvCat->bind(':delcat', $catToRemove);
$rmvCat->execute();
$rmvCat->closeConn();
}
?>
<legend>Available Categories</legend>
<div class="well">
<?php

$dbconn = new Database();
$dbconn->query('SELECT * FROM categories');
$availCats = $dbconn->resultSet();

foreach ($availCats as $cat) {
	echo "<span class='label label-info'>".$cat['name']."</span> ";
}
$dbconn->closeConn();
?>
</div>
<form class="form-horizontal" action="/categories/addcat" method="post">
<fieldset>

<!-- Form Name -->
<legend>Add Category</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Tag </label>  
  <div class="col-md-4">
  <input id="newtag" name="newcat" type="text" placeholder="your-new-category" class="form-control input-md">
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
<form class="form-horizontal" action="/categories/removecat" method="post">
<fieldset>

<!-- Form Name -->
<legend>Remove Category</legend>
<div class="form-group">
<!-- Text input-->
  <label class="col-md-4 control-label" for="textinput">Category </label>  
  <div class="col-md-4 center-block">
<select class="form-control" name="delcat">
  <option value="" disabled selected>Select Category:</option>
<?php

$listCats = new Database();
$listCats->query('SELECT * FROM categories');
$availCats = $listCats->resultSet();

foreach ($availCats as $cat) {
	echo "<option value='".$cat['id']."'>".$cat['name']."</option> ";
}
$listCats->closeConn();
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
