<form class="form-horizontal" action="/action_process" method="post" role="form">
<div class="form-group">
<input type="text" required="" class="form-control" name="title" id="title" placeholder="Title of Your New Post">
</div>
<div class="form-group">
<select required="" class="form-control" name="category">
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
<div class="form-group">
<center>
<textarea id="markdown" class="form-control" rows="20" name="newpost">
# First Content Area

Content
</textarea>
</center>
</div>
<div class="form-group pull-right">
<button class="btn btn-success btn-large" type="submit" value="Submit">Submit</button>
</div>
</form>
