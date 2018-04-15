===============================
	Required Software
===============================

- WAMPSERVER (X64) 3.0.6 

It includes,
	- Apache 2.4.23 
	– PHP 5.6.25/7.0.10 
	– MySQL 5.7.14 
	– PhpMyAdmin 4.6.4 
	– Adminer 4.2.5 
	– PhpSysInfo 3.2.5

This system is created using the above version of the wamp server but should work with other versions as well with some minor configuration changes.

Browser:

This system has been tested with,
- Google Chrome (Version 59.0.3071.115)
- Mozilla Firefox (Version 52.0.2)
- Internet Explorer (Version 11.0.24)

=================================
	HOW TO START THE SYSTEM
=================================

1) Install the wamp server.

- After installing, start the wamp server.
- In the system tray, left click on the wamp server's icon and select 'Start All Services'.

2) Import the required Database

- Open the browser and go to 'http://localhost', select phpmyadmin from the bottom of the page.
- In phpmyadmin, import the database from the file 'DBDesign.sql' by going to the import tab and selecting the file from your device.
- This will create all the tables and dump the data into the tables.

3) Move the source Code

- Go the C:/ directory and look for the folder 'wamp64'. In this folder, go to the folder named 'www'.
- Move all the source code (i.e in the directory 'lms') to the 'www' folder

4) Open Browser

- Now open the browser and go to the url 'http://localhost/lms'
- This will take you the index(Home) page of the library management System.
- You can use the system now.

