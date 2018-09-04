<!doctype html>
<html lang="en"><head>
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
	.klong{
		border-style:solid;
		background:#0C0;
		width:200px;
		padding:5px;
		border-color:#F00;
		margin-left:250px;
		margin-bottom:50px;
		padding:20px;
		background:#69F;
	}
	.area{
		margin-left:280px;
	}
    </style>
       

<title>Weblog</title>
</head>
<body>
<div align="center">
  <img  src="31344686_1704141333000568_3657415830821404672_n.png" width="100%" height="200" >
  </div>
  
  <br>
   <form  method="post"> 
  <a href="index2.php"  class="btn btn-primary" style="margin-left:560px">Home</a>
  <a href="create.php" class="btn btn-success" style="margin-left:30px" >สร้างกระทู้</a> 
&ensp;&ensp;&ensp; 
<a href="userhome.php?set=true" class="btn btn-info">User Home</a> &ensp;&ensp;&ensp;
<a href="alert.php" type="button" class="btn btn-primary"> แจ้งเตือน <span class="badge badge-light"><?php session_start(); echo   $_SESSION['num'] ?></span> <span class="sr-only"></span></a>
&ensp;&ensp;&ensp;
<a href="profile.php" class="btn btn-light">Profile </a>
&ensp;&ensp;&ensp;
<a href="login.php" class="btn btn-dark">Logout </a>
 </form></P>
<p>&nbsp;</p>
 &ensp;&ensp;&ensp; &ensp;&ensp;&ensp; &ensp;&ensp;&ensp; &ensp;&ensp;&ensp; &ensp;&ensp;&ensp; &ensp;&ensp;
 <table width="200" border="0" align="right">
   <tr>
      <td>&nbsp;</td>
    </tr>
  </table> 
  </div>
	<form method="post">
  <div >            
 <h3 class="table-warning" style="margin-left:240px;width:300px;padding:10px;border-color:#000;border-style:solid;border-radius:10px"> ประเภทกระทู้ : คำถาม</h3>
  </div>
<br>
  <table width="1000" border="0" align="center">
    <tr>
      <td><div class="input-group mb-3">
        <div class="input-group-prepend"> <span class="input-group-text" id="inputGroup-sizing-default"><b>หัวข้อ</b></span> </div>
        <input type="text" name="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
      </div></td>
    </tr>
  </table>
  <br>
	<div  style="margin-left:260px" class="input-group-prepend"> <span style="color:#C60" class="input-group-text" id="inputGroup-sizing-default"><b>รายละเอียด</b></span> </div>
  
  <p>&nbsp;</p>
    <label for="textfield"></label>
    <textarea style="border-radius:10px;margin:10px;padding:20px;margin-left:260px;width:1000px;height:500px;border-style:solid;border-width:3px;border-color:
  #000" name="contend"  id="textfield" placeholder="พิมพ์รายละเอียด"></textarea>
<?php
   try{
		
	ini_set("mongo.native_long", 0);
        ini_set("mongo.long_as_object", 1);
   $connection= new MongoClient("mongodb://chain:chain555@ds245082.mlab.com:45082/webblog");
      $db= $connection->webblog;
  $collection=$db->forum;
 
  $cursor = $collection->find();
  $totalrec=$cursor->count();
  $pid=rand(1,100000000);
  foreach($cursor as $log){
		$ch=$log['_id'];
		if($pid==$ch){
			$pid=rand(1,100000000);
		}
				 }
    
	if(!empty($_POST['title'])&&!empty($_POST['contend'])){
		date_default_timezone_set("Asia/Bangkok");
	$collection->insert(array("_id"=>$pid,"วันที่"=>date("d-m-Y"),"เวลา"=>date("H:i"),"doc_type"=>"คำถาม","name"=>$_POST['title'],
	"contend"=>$_POST['contend'],"username"=>$_SESSION['username'],"like"=>0,"comment"=>0));
	 $_SESSION['idforum']=$pid;
	 header('Location:look.php');
	}else{
		if(isset($_POST['title'])&&isset($_POST['contend'])){
		 echo "<script type='text/javascript'>alert('กรุณาป้อนข้อมูลให้ครบ!!');</script>";	}
		}
	}catch(Exception $e){}
  

?>
  <br>
  <br>
<button  type="submit" class="btn btn-primary" style="margin-left:1200px;" onclick="return confirm('Are you sure?')" >ตั้งกระทู้</button>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>