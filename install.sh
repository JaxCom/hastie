#!/bin/sh
clear
echo ' _    _           _       '
echo '| |  | |         | |      '
echo '| |__| |_   _  __| | ___  '
echo '|  __  | | | |/ _` |/ _ \ '
echo '| |  | | |_| | (_| |  __/ '
echo '|_|  |_|\__  |\____|\___| '
echo '         __/ |            '
echo '        |___/             '
echo "This script will attempt to set up permissions and generate a configuration file for Hyde."
echo "Please ensure you have already installed Jekyll and set up at least one project."
echo -n "Press any key to continue..."
read ANSWER
# Config generator
touch includes/config.php
echo "<?php" > includes/config.php
echo ""
read -p "Enter the absolute path for your _posts (/var/www/yoursite/_posts): " postsdir
if [ -d "$postsdir" ]; then
	sudo chown -R www-data:www-data $postsdir && echo "Success! Permissions updated for posts directory."
else
	echo  "Setting permissions failed: The _posts directory $postsdir does not exist. See README for information."
fi
echo "\$postsDirectory = \"$postsdir\";" >> ./includes/config.php
echo ""

read -p "Enter the absolute path for your Hyde installation (/var/www/yoursite/hyde): " hydedir
if [ -d "$hydedir" ]; then
        sudo chown -R www-data:www-data $hydedir && echo "Success! Ownership of Hyde directory updated."
	sudo chmod -R 664 $hydedir && echo "Success! Permissions updated for Hyde directory."
else
        echo  "Setting permissions failed: The Hyde directory $hydedir does not exist. See README for information."
fi
echo "\$backendurl = \"$hydedir\";" >> ./includes/config.php
echo ""

read -p "Enter the absolute path of your Jekyll source. (/var/www/yoursite): " sourcepath
echo "\$sourcedir = \"$sourcepath\";" >> ./includes/config.php
echo ""

read -p "Enter the absolute path for jekyll to build into. (/var/www/yoursite/_site): " targetdir
echo "\$webroot = \"$targetdir\";" >> ./includes/config.php
echo ""

read -p "Your website's URL (including http://): " siteurl
echo "\$siteurl = \"$siteurl\";" >> ./includes/config.php
echo ""

read -p "Your website's name : " websitename
echo "\$sitename = \"$websitename\";" >> ./includes/config.php
echo ""

read -p "Backend Title (Default: Hyde): " customtitle
: ${customtitle:=Hyde}
echo "\$hydetitle = \"$customtitle\";" >> ./includes/config.php

exit 0
