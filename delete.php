<?php 
	include './lib/security.php';
	include './lib/ProjectFair.php';
    $fair = new Fair();

    if ($_SESSION['usetype'] =='student') {
	  header("location:userIndex.php");
	}

    $id=$_GET['id'];
    $delete = $fair->deleteProposal($id);

?>