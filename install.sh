#!/bin/sh
echo ' _    _           _       '
echo '| |  | |         | |      '
echo '| |__| |_   _  __| | ___  '
echo '|  __  | | | |/ _` |/ _ \ '
echo '| |  | | |_| | (_| |  __/ '
echo '|_|  |_|\__  |\____|\___| '
echo '         __/ |            '
echo '        |___/             '
echo "This script will attempt to set up permissions for Hyde."
echo -n "Enter the absolute path for your _posts and press [ENTER]: "
read postsdir
echo -n "Enter the absolute path for your Hyde installation and press [ENTER]: "
read hydedir

if [ -d "$postsdir" ]; then
	sudo chown -R www-data:www-data $postsdir && echo "Success! Permissions updated for posts directory."
else
	echo  "Failed: The _posts directory $postsdir does not exist."
fi

if [ -d "$hydedir" ]; then
        sudo chown -R www-data:www-data $hydedir && echo "Success! Ownership of Hyde directory updated."
	sudo chmod -R 664 $hydedir && echo "Success! Permissions updated for Hyde directory."
else
        echo  "Failed: The Hyde directory $hydedir does not exist."
fi

exit 0
