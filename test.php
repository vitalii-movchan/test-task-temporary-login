<?php
// filename: test-connection.php by running command -> php test-connection.php
$connect = odbc_connect("Driver=Vertica; Server=sbase.company.ca; Port=1433; TDS_Version=8; ClientCharset=UTF-8; Database=mydbase",'company\\user', 'password');
?>
