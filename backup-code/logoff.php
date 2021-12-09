<?php
session_start() ;

include_once("config/config.php");

session_destroy();
print "<script language = 'javascript'>" ;
	print "window.location.href ='".URL."' " ;
print "</script>" ;
?>