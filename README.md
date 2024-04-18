Basic PHP honeypot
by Chris Bolduc

Requirements: Linux server with PHP enabled.  (Not tested on other platforms, but it will probably work.)

Installation:
1. Create the directory /var/log/honeypot and allow apache or nginx to write to it.
2. Extract index.php and login.php to where your web server keeps HTML files (e.g. /var/www/html)
3. You can rename index.php to something else if you want, but login.php must be in the same folder.
