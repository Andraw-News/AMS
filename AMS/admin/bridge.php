<?php
session_start();
include 'action.php';
$action = new adminActions();
if(!empty($_GET['action']) && $_GET['action'] == 'logout') {
	session_unset();
	session_destroy();
	header("Location: ../adminlog.php");
}
//Alumni Management
if(!empty($_POST['action']) && $_POST['action'] == 'GetAlumniList') {
	$action->getAlumniList();
}
if(!empty($_POST['action']) && $_POST['action'] == 'ViewAlumniProfile') {
	$action->viewAlumniProfile();
}
if(!empty($_POST['action']) && $_POST['action'] == 'EditAlumniProfile') {
	$action->editAlumniProfile();
}
if(!empty($_POST['action']) && $_POST['action'] == 'UpdateAlumniProfile') {
	$action->updateAlumniProfile();
}
if(!empty($_POST['action']) && $_POST['action'] == 'SendEmail') {
	$action->sendEmail();
}
//Sign Up Management
if(!empty($_POST['action']) && $_POST['action'] == 'GetSignupList') {
	$action->getSignupList();
}
if(!empty($_POST)){
	if(!empty($_POST['action']) && $_POST['action'] == 'ApprovedAccount') {
	$action->approvedAccount();
	}
	if(!empty($_POST['action']) && $_POST['action'] == 'RemovedAccount') {
		$action->removedAccount();
	}
}
// Chat Management
if(!empty($_POST['action']) && $_POST['action'] == 'GetConvo') {
	$action->getConvo();
}
if(!empty($_POST['action']) && $_POST['action'] == 'SendMessage') {
	$action->sendMessage();
}
// Chat Management
if(!empty($_POST['action']) && $_POST['action'] == 'GetAllPost') {
	$action->getAllPost();
}
?>