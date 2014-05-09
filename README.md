Hyde
====
A web-based backend for Jekyll
- Author: Jeff Brown <jbrown@jaxcom.org>
- Website: http://jaxcom.github.io/Hyde

### DESCRIPTION
Hyde is a utility for web-based authoring of Jekyll posts. 
It uses SQLite for user login purposes.
It also utilizes other libraries and tools listed at the end of this readme.
Documentation and licenses for these can be found in /docs.

### REQUIREMENTS
- PHP 5.5 (with PDO, SQLite3, or SQLiteDatabase)
- Ability to set permissions on server files and folders
- A working Jekyll installation

### INSTALLATION
1.  Locate the config file (/includes/config.php)
2.  Set the variables to your desired settings
3.  Run ./install.sh
4.  Browse to http://{{ YOUR URL}}/_installation/_install.php
5.  Copy the randomly generated password after installation.
6.  DELETE the files 'install.php' and 'install.sh' (for security)
7.  Browse to your URL, and log in with the username "admin" and the 10 character password from the install page.

---

##### If the install.sh script fails
1.  Ensure the directory for Hyde is writeable
	* (sudo chmod -R 664 {{Hyde directory}})
2.  Grant ownership of your '/_posts' directory to user 'www-data'
        * (sudo chown -R www-data:www-data /var/www/{{your directory}}/_posts)

---

### Acknowledgements
- PHP Markdown Extra <http://michelf.ca/projects/php-markdown/extra>
- MarkItUp! <http://markitup.jaysalvat.com/>
- phpliteAdmin <http://code.google.com/p/phpliteadmin>
- PHP Login <http://www.php-login.net>
