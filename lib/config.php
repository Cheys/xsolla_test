<?php
	ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
$mysqli = new mysqli('localhost', 'cd05714_xsolla', 'f0kJW7RP', 'cd05714_xsolla');
if ($mysqli->connect_error)throw new Exception('connect error '.$mysqli->connect_errno.'->'.$mysqli->connect_error);
