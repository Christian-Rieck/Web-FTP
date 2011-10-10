README
======

Web-FTP - General Information
-----------------------------

Requirements
------------

My Web-FTP script requires PHP 5.x and up and with user feature, you'll need a MySQL Database with MySQLi support.

Installation
------------

So far, it doesn't give a installation routine or something else, it's only copying the files on your webserver and replace the information of the MySQL Database.
And at last, you must replace "mysql_config_my.php" with "mysql_config.php" in login.php, register.php and user.php. There are out-commented lines under the actual line, you only must delete the above one and uncomment the under one.

Documentation
-------------

It doesn't give a documentation too, because the whole project will be restructured the next weeks with the MVC Pattern.