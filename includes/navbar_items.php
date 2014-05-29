<ul class="nav navbar-nav">
        <li><a href="/action/create">Create Post</a></li>
        <li><a href="/action/publish">Publish Site</a></li>
        <li><a href="/edit/index">Edit Posts</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
          <ul class="dropdown-menu">
        <li><a href="/manage-tags/">Manage Tags</a></li>
        <li><a href="/categories/">Manage Categories</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Help <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Publishing</a></li>
            <li><a href="#" data-toggle="modal" data-target="#markdown-modal">Formatting</a></li>
            <li class="divider"></li>
            <li><a href="#">Contact Support</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<?php
session_start();
if (isset($_SESSION['real_name'])) {
        echo 'Logged in as ' . $_SESSION['real_name'].' ';
}
else {
        echo 'Logged in as ' . $_SESSION['user_name'].' ';
}
?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
        <li><a href="/user/logout">Log Out</a></li>
            <li><a href="/user/register">Add User</a></li>
	
          </ul>
        </li>

      </ul>
