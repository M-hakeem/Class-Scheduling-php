<?php

if (empty($_SESSION['is']['UserName'])) {
require('denied.php');
exit;
}
$user =  $_SESSION['is']['UserName'];
if (!$user) { 
require('denied.php');
exit;
}
?>