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


<div class="row">
<div class="col-7 col-md-7 col-lg-7 col-sm-7">
<div class="panel panel-info">
<div class="panel-heading">
	<h3 class="panel-title">Create a New Post</h3>
</div>
<div style="padding:30px" class="panel-body">
	<?php include('includes/editorform.php'); ?>
</div><!--panel-body-->
</div><!--panel-->
</div><!--size-->
<div class="col-5 col-md-5 col-lg-5 col-sm-5">
<div class="panel panel-warning">
<div class="panel-heading">
	<h3 class="panel-title">Using the Editor</h3>
</div>
<div class="panel-body">
	<?php include('includes/editorhelp.php'); ?>

</div><!--panel-body-->
</div><!--panel-->
</div><!--size-->
</div><!--row-->


<script language="javascript">
$(document).ready(function()	{
    $('#markdown').markItUp(myMarkdownSettings);
});
</script>
	<?php include('includes/footer.php'); ?>
