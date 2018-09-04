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
  ini_set("mongo.native_long", 0);
        ini_set("mongo.long_as_object", 1);
	   $connection= new MongoClient("mongodb://chain:chain555@ds245082.mlab.com:45082/webblog");
      $db= $connection->webblog;
	  $collection=$db->forum;
	  $cursor=$collection->find();
	   if(isset($_GET['id'])){
		
		 $collection->remove(array("_id"=>(int)$_GET['id']));
		 $collection=$db->comment;
		 $collection->remove(array("forumid"=>(int)$_GET['id']));
		 }
	 
  ?>
   

<body>
<br>
<br>
<center><h2><b><font color="#000000">เรียกดู Posts ทั้งหมด</font></b></h2></center>
<br>
<br>
<center><table  class="table">
  <thead class="thead-dark" >
    <tr>
      <th scope="col">No.</th>
      <th scope="col">หัวข้อ</th>
      <th scope="col">User</th>
      <th scope="col">ประเภท</th>
       <th scope="col">จำนวนไลค์</th>
        <th scope="col">จำนวนคอมเม้น</th>
        <th scope="col">วันที่</th>
        <th scope="col">Check</th>
         <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody bgcolor="#FFFFFF">
  <?php $c=0;
   foreach($cursor as $log){
	    $id=$log['_id'];
		$username=$log['username'];
		$name=$log['name'];
		$type=$log['doc_type'];
		$like=$log['like'];
		$comment=$log['comment'];
		$day=$log['วันที่'];
		$c++;
		 ?>
    <tr>
    <form method="post">
      <th scope="row"><?php echo $c; ?></th>
      <td><?php echo $name ?></td>
      <td><?php echo $username ?></td>
      <td><?php echo $type ?></td>
      <td><?php echo $like ?></td>
      <td><?php echo $comment ?></td>
      <td><?php echo $day ?></td>
      <td><a href="look.php?set=<?php echo $id ?> " class="btn btn-primary btn-sm">Check</a></td>
      <td><a href="allpost.php?id=<?php echo $id ?> " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a></td>
      </form>
    </tr>
    <?php } ?>
   
  </tbody>
</table></center>
<br>
<center><a href="userhome.php" class="btn btn-light" style="border:1px solid #000">ย้อนกลับ</a></center>
<br />

<br />

<br />
<br />
<br />
</body>
</html>