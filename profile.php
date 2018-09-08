<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <style type="text/css">
    body {
	
	background-image:url(1511.jpg);
	background-size:cover;
	background-attachment:fixed;
	

	 }
	 input{

		

	border:2px solid #d1c7ac;
	width: 400px;
	color:#333333;
	padding:3px;
	margin-right:4px;
	
	font-family:tahoma, arial, sans-serif;
		
		 
	 }
	 b{
	margin-right:50px;
	 }
	 p{
		 margin:15px;
		 margin-left:500px;
	 }
	 
	
    </style>
     <?php
     ini_set("mongo.native_long", 0);
        ini_set("mongo.long_as_object", 1);
	   $connection= new MongoClient("mongodb://chain:chain555@ds245082.mlab.com:45082/webblog");
      $db= $connection->webblog;
  $collection=$db->user;
  	session_start();
	if(isset($_POST['update2'])){
		if((isset($_POST['username'])&&isset($_POST['password']))){
			$collection->update(array("username"=>$_POST['username']),array('$set'=>array("password"=>$_POST['password'],
			"name"=>$_POST['name'],"email"=>$_POST['email'],"address"=>$_POST['address'],"district"=>$_POST['district'],
			"province"=>$_POST['province'],"city"=>$_POST['city'],"zipcode"=>$_POST['zipcode'],"gender"=>$_POST['gender'])));
			
		}
		}
	
	 	$doc=array("username"=>$_SESSION['username']);
		$cursor=$collection->find($doc);
		foreach($cursor as $log){
		$user=$log['username'];
		$password=$log['password'];
		$name=$log['name'];
		$email=$log['email'];
		$address=$log['address'];
		$district=$log['district'];
		$gender=$log['gender'];
		$province=$log['province'];
		$city=$log['city'];
		$zipcode=$log['zipcode'];
		$day=$log['dayregister'];
		}
		
		
		

  ?>
   
    <title>Weblog</title>
  </head>
<body>
    <img  src="31344686_1704141333000568_3657415830821404672_n.png" >
    <br>
<br>
  <a href="home.php"  class="btn btn-primary" style="margin-left:560px">Home</a>
  <a href="create.php" class="btn btn-success" style="margin-left:30px" >สร้างกระทู้</a> 
&ensp;&ensp;&ensp; 
<a href="userhome.php?set=true" class="btn btn-info">User Home</a> &ensp;&ensp;&ensp;
<a href="alert.php" type="button" class="btn btn-primary"> แจ้งเตือน <span class="badge badge-light"><?php echo  $_SESSION['num'] ?></span> <span class="sr-only"></span></a>
&ensp;&ensp;&ensp;
<a href="profile.php" class="btn btn-light">Profile </a>
&ensp;&ensp;&ensp;
<a href="login.php" class="btn btn-dark">Logout </a>
 
<br>
<br>
<br>


<form method="post">
<p>
   <b>Username</b>
     
     <input name="username" type="text"  id="username" style="margin-left:10px"  value="<?php echo $user ?>" readonly>
     </p>
     <p>
 <b>Password</b>
    <input name="password"type="password"  id="password" style="margin-left:11px" value="<?php echo $password ?>">
    </p>
    <p>
  <b>ชื่อ</b>
    <input name="name" type="text"  id="name" style="margin-left:60px" value="<?php echo $name ?>">
   </p>
   <p>
  <b>เพศ</b>
  <input name="gender" type="text"  id="gender" style="margin-left:51px" value="<?php echo $gender ?>">
	     </p>
         <p>
   <b>Email</b>
      <input name="email" type="text"  id="email" style="margin-left:40px" value="<?php echo $email ?>">
      </p>
      <p>
  <b>Address</b>
     <input name="address" type="text"  id="address" style="margin-left:20px"  value="<?php echo $address ?>">
     </p>
     <p>
  <b>ตำบล</b>
   <input name="city" type="text"  id="city" style="margin-left:40px" value="<?php echo $city ?>">
   </p>
   <p>
  <b>อำเภอ</b>
     <input name="district" type="text"  id="district" style="margin-left:35px" value="<?php echo $district ?>">
  </p>
  <p>
   <b>จังหวัด</b>
    
     <input name="province" type="text"  id="province" style="margin-left:31px" value="<?php echo $province ?>">
     </p>
     <p>
<b>Zipcode</b>
 
     <input name="zipcode" type="text"  id="zipcode" style="margin-left:18px"  value="<?php echo $zipcode ?>">
     </p>
     <p>
<b>วันที่สมัคร</b>
 <input name="day" type="text"  id="day" style="margin-left:8px" value="<?php echo $day ?>" readonly>
</p>

  <input style="margin-left:932px; width:100px" type="submit"  class="btn btn-danger"  name="update2" onclick="return confirm('Are you sure?')" value="แก้ไขข้อมูล">
 

</form>
 <br>
  <br>
 <br>
  
  </body>
</html>