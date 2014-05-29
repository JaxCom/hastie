<?php include('includes/dbwrapper.php'); ?>
<form class="form-horizontal" action="/action/process" method="post" role="form">
<div class="form-group">
<input type="text" required="" class="form-control" name="title" id="title" placeholder="Title of Your New Post">
</div>
<div class="form-group">
<select id="catcombo" required="" class="form-control" name="category">
  <option value="" disabled selected>Select a Post Type </option>
<?php

$getCats = new Database();
$getCats->query('SELECT * FROM categories');
$availTags = $getCats->resultSet();

foreach ($availTags as $tag) {
	echo "<option value='".$tag['name']."'>".$tag['description']."</option> ";
}
$getCats->closeConn();
?>

</select>
</div>
<div class="form-group">
<select multiple class="form-control" name="tags[]">
  <option value="" disabled>Select Tags:</option>
<?php

$dbconn = new Database();
$dbconn->query('SELECT * FROM tags');
$availTags = $dbconn->resultSet();

foreach ($availTags as $tag) {
	echo "<option value='".$tag['name']."'>".$tag['name']."</option> ";
}
$dbconn->closeConn();
?>


</select>

</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Event Date" id="datepicker" style="display: none;" />
</div>
<div class="form-group">
<center>
<textarea id="markdown" class="form-control" rows="20" name="newpost">
A brief excerpt for your post, the tag below indicates where the post should split.
<!--more-->
# First Content Header

Content
</textarea>
</center>
</div>
<div class="form-group pull-right">
<button class="btn btn-success btn-large" type="submit" value="Submit">Submit</button>
</div>
</form>
    <script src="/js/compressed/picker.js"></script>
    <script src="/js/compressed/picker.date.js"></script>
    <script src="/js/compressed/picker.time.js"></script>
<script>

document.getElementById('catcombo').onchange = function() {
  var display = this.selectedIndex == 2 ? "inline" : "none";
  document.getElementById('datepicker').style.display = display;

}
</script>
<script>
$('.datepicker').pickadate()
</script>
