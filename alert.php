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
	div{
		width:700px
		
	}
	</style>
     <?php
     	ini_set("mongo.native_long", 0);
				ini_set("mongo.long_as_object", 1);
		session_start();
		
  	  $connection= new MongoClient("mongodb://chain:chain555@ds245082.mlab.com:45082/webblog");
  	  $db= $connection->webblog;
  		$collection=$db->alert;
		$doc=array('forumuser'=>$_SESSION['username']);
		$cursor = $collection->find($doc);
		$rec=$cursor->count();

?>
<title>Weblog</title>
</head>
<body>

  <img  src="31344686_1704141333000568_3657415830821404672_n.png" width="100%" height="200" >
 
 <br>
  <br>
 
   <form  method="get"> 
  <a href="index2.php"  class="btn btn-primary" style="margin-left:560px">Home</a>
  <a href="create.php" class="btn btn-success" style="margin-left:30px" >สร้างกระทู้</a> 
&ensp;&ensp;&ensp; 
<a href="userhome.php?set=true" class="btn btn-info">User Home</a> &ensp;&ensp;&ensp;
<a href="alert.php" type="button" class="btn btn-primary"> แจ้งเตือน <span class="badge badge-light"><?php echo $rec ?></span> <span class="sr-only"></span></a>
&ensp;&ensp;&ensp;
<a href="profile.php" class="btn btn-light">Profile </a>
&ensp;&ensp;&ensp;
<a href="login.php" class="btn btn-dark">Logout </a></P>
<p>&nbsp;</p>
<center><h2 style="font-family:'Arial Black', Gadget, sans-serif;color:#000;padding:8px;border:2px solid #F00;border-radius:10px;width:270px;background-color:#0F6">แจ้งเตือน</h2></center>
<br>
<br>
<center>
<?php 
  foreach($cursor as $log){
	  $user=$log['ucomment'];
	  $name=$log['nameforum'];
	 
	  ?>
	   <div  class="alert alert-light" style="border:solid 2px #000000" role="alert"><b><?php echo $user." (Comment) ".$name ?></b></div>
 <?php } ?>
  
  <?php 
	$collection->remove(array("forumuser"=>$_SESSION['username']));
	$_SESSION['num']=0;
?>

</center>

</form>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>