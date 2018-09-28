<?php
session_start();

if(!$_SESSION['email'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VIEW</title>
<script type="text/javascript">
function remove(id)
{
	if(confirm(' Sure to remove file ? '))
	{
		window.location='delete.php?remove_id='+id;
	}
}
</script>
<script language="javascript" src="users.js" type="text/javascript"></script>

</head>

<body>
<form method="post" enctype="multipart/form-data" action="muldelete.php">
<table  align="center" bgcolor="#999999" border="2" bordercolor="#0000FF">
		<tr>
		<td align="right" colspan="9"><font color="#FFFF00"><?php echo $_SESSION['email'];?></font></td>
			<td align="center" colspan="3"><strong><a href="logout.php"><font color="#FFFF00">Logout here</a> </font></srtong></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<th>#</th>
			<th>ID</th>
			<th>NAME</th>
			<th>EMAIL</th>
			<th>ADDRESS</th>
			<th>MOBILE</th>
			<th>GENDER</th>
			<th>IMAGE</th>
			<th>HOBBIES</th>
			<th>COUNTRY</th>
			<th>DATE OF BIRTH</th>
			<th colspan="2">ACTION</th>
		</tr>
		
		<?php
		include_once("db.php");
		$sql="select * from users";
		$r=mysql_query($sql);
		$i=0;
		while($row = mysql_fetch_array($r)) 
		{		
		
		?>
		<tr>
		<td ><font color="#FFFFFF"><input name="checkbox[]" type="checkbox"  value="<? echo $row['id']; ?>"></font></td>
		<td><font color="#FFFFFF"><?php echo $row['id'];?></font></td>
		<td><font color="#FFFFFF"><?php echo $row['name'];?></font></td>
		<td><font color="#FFFFFF"><?php echo $row['email'];?></font></td>
		<td><font color="#FFFFFF"><?php echo $row['address']; ?></font></td>
		<td><font color="#FFFFFF"><?php echo $row['mobile'];?></font></td>
		<td><font color="#FFFFFF"><font color="#FFFFFF"><?php echo $row['gender']; ?></font></td>
		<td><img src="upload/<?php echo $row['image']; ?>" width="80px" height="40px" border="5" /></td>
		<td><font color="#FFFFFF"><?php echo $row['hobbies']; ?></font></td>
		<td><font color="#FFFFFF"><?php echo $row['country']; ?></font></td>
		<td><font color="#FFFFFF"><?php echo $row['dob']; ?></font></td>
		<td><a href="javascript:remove(<?php echo $row['id'] ?>)"><font color="#FFFF00">Delete file</font></a></td>
		<td><a href="update.php?ide=<?php echo $row['id']; ?>"><font color="#FFFF00">Edit</font></a></td>
		</tr>
		
		<?php
		
		}
		?>
		<tr>
				<td>
				<input name="delete" type="submit" id="delete" value="Delete"></td>
		</tr>

		
</table>
</form>



</body>
</html>
