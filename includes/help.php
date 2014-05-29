<?php
include_once "includes/markdown.php";

$cheatsheet = file_get_contents('./docs/Markdown-Cheatsheet.markdown');

echo Markdown($cheatsheet);

?>
