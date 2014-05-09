Jekyll Backend
--------------
This is a utility for web-based authoring of Jekyll posts. 
It uses SQLite for user login purposes.
It also utilizes other libraries and tools listed at the end of this readme.
Documentation and licenses for these can be found in /docs.

REQUIREMENTS
------------
- PHP 5.3+ (with PDO and SQLite)
- Ability to set permissions on server files and folders

INSTALLATION
-------------
1. Locate the config file (/includes/config.php)
2. Set the variables to your desired settings
3. Ensure the directory for Jekyll Backend is writeable
4. Grant ownership of your '/_posts' directory to user 'www-data'
	(sudo chown -R www-data:www-data /var/www/{{your directory}}/_posts)
3. Browse to http://{{ YOUR URL}}/_installation/_install.php
4. DELETE the /_installation/ directory and its contents (for security)

License
----------
Jekyll Backend is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Jekyll Backend is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
<http://www.gnu.org/licenses/>.
