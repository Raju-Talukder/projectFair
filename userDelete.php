<?php 
	include './lib/security.php';
	include './lib/ProjectFair.php';
    $fair = new Fair();

    if ($_SESSION['usetype'] =='teacher') {
	  header("location:index.php");
	}

    $id=$_GET['id'];
    $delete = $fair->userDeleteProposal($id);

?>