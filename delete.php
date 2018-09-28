<?php
include_once 'db.php';
if(isset($_GET['remove_id']))
{
	$res=mysql_query("SELECT image FROM users WHERE id=".$_GET['remove_id']);
	$row=mysql_fetch_array($res);
	mysql_query("DELETE FROM users WHERE id=".$_GET['remove_id']);
	unlink("upload/".$row['image']);
	header("Location: view.php");
}
?>