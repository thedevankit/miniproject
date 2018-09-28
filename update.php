<?php 
//error_reporting(0);
include('db.php');
if(isset($_GET['ide']))
{
$sql=mysql_query("select * from users where id='{$_GET['ide']}'");
$row=mysql_fetch_array($sql);
$hobb=explode(",",$row['hobbies']);
$pic=$row['image'];
}
if(isset($_REQUEST['save']))
{
$newpic=$_FILES['file']['name'];
if($newpic)
{
	if(move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$_FILES['file']['name']))
	{
		unlink("upload/".$row['image']);
		$name=$_POST['name'];
		$add=$_POST['add'];
		$gen=$_POST['gen'];
		$part=$_FILES['file']['name'];
		$hobbies=implode(",",$_POST['hobb']);
		$country=$_POST['country'];
		$dob=$_POST['dob'];
		$query=mysql_query("UPDATE `example`.`users` SET 
										`name` = '$name', 
										`address` = '$add', 
										`gender` = '$gen',
										`image` = '$part', 
										`hobbies` = '$hobbies', 
										`country` = '$country', 
										`dob` = '$dob' 
										WHERE `users`.`id` = '{$_GET['ide']}'")or die(mysql_error());
		header('location:view.php');

	}
}	
	
else
{
	$name=$_POST['name'];
	$add=$_POST['add'];
	$gen=$_POST['gen'];
	$hobbies=implode(",",$_POST['hobb']);
	$country=$_POST['country'];
	$dob=$_POST['dob'];
	$query=mysql_query("UPDATE `example`.`users` SET 
										`name` = '$name', 
										`address` = '$add', 
										`gender` = '$gen', 
										`hobbies` = '$hobbies', 
										`country` = '$country', 
										`dob` = '$dob' 
										WHERE `users`.`id` = '{$_GET['ide']}'")or die(mysql_error());
	echo $query;
	header('location:view.php');

}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<form action="" method="post" enctype="multipart/form-data">
<table align="center" bgcolor="#999999" border="2" bordercolor="#0000FF">
		<tr>
				<td>Name</td>
				<td>:</td>
				<td><input type="text" name="name" value="<?php echo $row['name'];?>"/></td>
		</tr>
		
		<tr>
				<td>Address</td>
				<td>:</td>
				<td><input type="text" name="add" value="<?php echo $row['address'];?>" /></td>
		</tr>
		
		<tr>
				<td>Gender</td>
				<td>:</td>
				<td>
						<select name="gen">
								<option value="male" <?php echo ($row['gender']=='male')?'selected="selected"':'' ?>>MALE</option>
								<option value="female"<?php echo ($row['gender']=='female')?'selected="selected"':'' ?>>FEMALE</option>
						</select>
				</td>
		</tr>
		<tr>
				<td>Image</td>
				<td>:</td>
				<td><input type="file" name="file"  /></td>
				<td><img src="upload/<?php echo $row['image']; ?>" width="80px" height="60px"/></td>
		</tr>
		<tr>
				<td>Hobby</td>
				<td>:</td>
				<td>
					cricket<input type="checkbox"  name="hobb[]" value="cricke"
					 <?php in_array('cricke',$hobb)? print "checked":""; ?> />
					singing<input type="checkbox" name="hobb[]" value="singing"
					<?php in_array('singing',$hobb)? print "checked":""; ?> /> 
					dancing<input type="checkbox" name="hobb[]" value="dancing"
					<?php in_array('dancing',$hobb)? print "checked":""; ?> ?>    				
				</td>
		</tr>
		<tr>
				<td>Country</td>
				<td>:</td>
				<td><input type="text" name="country" value="<?php echo $row['country'];?>"  /></td>
		</tr>
		<tr>
				<td>Date Of Birth</td>
				<td>:</td>
				<td><input type="text" name="dob" value="<?php echo $row['dob'];?>"  /></td>
		</tr>
		
		<tr>
		<td colspan="3" align="center"><input type="submit" name="save" value="update" /></td>
		</tr>
</table>
</form>
</body>
</html>
