<?php
include("db.php"); 
if(isset($_GET['delete']))
{
	$rowCount = count($_POST["checkbox"]);
	for($i=0;$i<$rowCount;$i++) 
	{

		$res=mysql_query("SELECT image FROM users WHERE id=".$_POST['checkbox'][$i]);
		echo $res;
		$row=mysql_fetch_array($res);
		mysql_query("DELETE FROM users WHERE id=".$_POST['checkbox'][$i]);
		unlink("upload/".$row['image']);
	}
}
//header("Location:view.php");
?>