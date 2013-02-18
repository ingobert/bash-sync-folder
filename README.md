1. Description
The script synchronizes a local folder to multiple servers


2. Required packages

inotify-tools


3. usage
copy  servercopy.php and ssync to a bin folder
create a config.ini in folders which you want to keep synchronized

ms@xeon:/var/www$ cat foundation/config.ini 
server=perdix,patria;
targetPath=/var/www/pearlfection.de/www/htdocs/foundation/
ignore=config.rb, sass;



Now run 
ms@xeon:~$ ssync /var/www/foundation/



if you touch or edit a file, it will be synchronized to all servers 
