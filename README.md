# Built in sqlite crud
Unzip the folderDownload php from php.net

Change the php.ini file. (find extension=php_pdo_sqlite.dll , extension=php_sqlite3.dll & sqlite3.extension_dir = . then uncomment them set the sqlite3.extension_dir path)

Paste the crud folder into php folder

Open you command prompt/terminal

Type "php -S localhost:8000 -t location_of_crud_folder/crud"
