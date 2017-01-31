<?php
// Establish a database connection
// 1st Parameter: Is the address of the MySql Server
// 2nd Parameter: Username of the MySql Server, in our case localhost
// 3rd Parameter: Password of the MySql Server ('' means no password)
// 4th Parameter: The name of the Database you want to connect (This must match with the name in MySql Workbench!) "Filmverwaltung" in our case
$connection = new MySqli('localhost', 'root', '', 'Filmverwaltung');

// Setting the encoding type of the Database, this allows you to use ü, ä, ö...
$connection->set_charset('utf8');
?>
