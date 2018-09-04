<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">


 <style type="text/css">
    body {
	
	background-image:url(1511.jpg);
	background-size:cover;
	background-attachment:fixed;
	

	 }
	
    </style>
<title>Weblog</title>
</head>
  <?php
	    $connection= new MongoClient("mongodb://chain:chain555@ds245082.mlab.com:45082/webblog");
      $db= $connection->webblog;
	  $collection=$db->user;
	  $cursor=$collection->find();
	  session_start();
	 if(isset($_GET['user'])){
		 if($_SESSION['username']!=$_GET['user']){
		 $collection->remove(array("username"=>$_GET['user']));
		 }else{
			  echo "<script type='text/javascript'>alert('ไม่สามารถลบตัวเองได้');</script>";
		 }		 
	 }
  ?>
   

<body>
<br>
<br>
<center><h2><b><font color="#000000">เรียกดู User ทั้งหมด</font></b></h2></center>
<br>
<br>
<table class="table">
  <thead class="thead-dark" >
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Username</th>
      <th scope="col">name</th>
      <th scope="col">gender</th>
       <th scope="col">email</th>
        <th scope="col">status</th>
        <th scope="col">วันที่สมัคร</th>
         <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody bgcolor="#FFFFFF">
  <?php $c=0;;
   foreach($cursor as $log){
		$username=$log['username'];
		$name=$log['name'];
		$email=$log['email'];
		$gender=$log['gender'];
		$status=$log['status'];
		$day=$log['dayregister'];
		$c++;
		 ?>
    <tr>
    <form method="post">
      <th scope="row"><?php echo $c; ?></th>
      <td><?php echo $username ?></td>
      <td><?php echo $name ?></td>
      <td><?php echo $gender ?></td>
      <td><?php echo $email ?></td>
      <td><?php echo $status ?></td>
      <td><?php echo $day ?></td>
      <td><a href="alluser.php?user=<?php echo $username ?> " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a></td>
      </form>
    </tr>
    <?php } ?>
   
  </tbody>
</table>
<br>
<center><a href="userhome.php" class="btn btn-light" style="border:1px solid #000">ย้อนกลับ</a></center>
</body>
</html>