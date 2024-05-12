<?php
ob_start();
session_start();
include 'action.php';
$action = new adminActions();
$action->getBdayEvents();
?>