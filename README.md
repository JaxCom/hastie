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
1.  Run ./install.sh
2.  Browse to http://{{ YOUR URL}}/install.php
3.  Copy the randomly generated password after installation.
4.  Browse to your URL, and log in with the username "admin" and the 10 character password from the install page.
5.  DELETE the files 'install.php' and 'install.sh' (for security)

---

##### If the install.sh script fails:

```shell
#Ensure the directory for Hyde is writeable
sudo chmod -R 664 {{Hyde directory}}
```

```shell
#Grant ownership of your '/_posts' directory to user 'www-data'
sudo chown -R www-data:www-data /var/www/{{your directory}}/_posts
```

```shell
#Change the name of 'includes/config.sample.php' to 'config.php'
mv includes/config.sample.php includes/config.php

#Fill in the values in config.php manually
```

---

### Acknowledgements
- PHP Markdown Extra <http://michelf.ca/projects/php-markdown/extra>
- MarkItUp! <http://markitup.jaysalvat.com/>
- phpliteAdmin <http://code.google.com/p/phpliteadmin>
- PHP Login <http://www.php-login.net>
