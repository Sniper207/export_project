<?php 

define("SERVER", 'localhost');
define("USER", 'root');
define("PASS", '');
define("DBNAME", 'export_project');

// connection to mysql
$conn = new mysqli(SERVER , USER , PASS , DBNAME);

// arabic lang
$conn -> set_charset('utf8');