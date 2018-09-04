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
	.mar{
		padding:10px;
		border-style:solid;
		color:#F00;
		margin-left:200px;
		background:#CF6;
		border-color:#000;
		width:900px;
		border-radius:10px;
		font-family:Verdana, Geneva, sans-serif;
	}
	.mar2{
		
		margin-top:50px;
		border-style:solid;
		color:#000;
		margin-left:200px;
		background:#0C6;
		border-color:#000;
		width:1200px;
		height:auto;
		border-radius:5px;
		box-shadow:10px 10px;
		padding:18px;
		font-family:Verdana, Geneva, sans-serif;
		border-radius:20px;
		
	}
    </style>
   <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script>
	function check(){
		$(function(){
			$("#manage").hide();
		
		});
	}
	</script>
    
    <?php		
				 session_start();
			if (isset($_GET['set'])) {
    					$_SESSION['key']=0;
  					}
			
			 echo"<script language='javascript'>
					check();
			 </script>";
	
	  		    function pre() {
						if($_SESSION['key']>0){
    						$_SESSION['key']-=10;
						}
				}
				function nex() {
						if($_SESSION['key']<$_SESSION['total']-10){
    						$_SESSION['key']+=10;
						}
				}
				 if (isset($_GET['hello1'])) {
    					pre();
  					}
				 if (isset($_GET['hello2'])) {
    					nex();
  				 }

			       $connection= new MongoClient("mongodb://chain:chain555@ds245082.mlab.com:45082/webblog");
  	  				$db= $connection->webblog;
  				 $collection=$db->forum;
				 $doc=array('username'=>$_SESSION['username']);
 				 $cursor = $collection->find($doc);
				 $_SESSION['total']=$cursor->count();
				 
				 
				 $j=0;
				 
				 $listtem[]=array();
				 $listIDtem[]=array();
				 $listTypetem[]=array();
				 foreach($cursor as $log){
					 $listtem[$j]=$log['name'];
					 $listIDtem[$j]=$log['_id'];
					 $listTypetem[$j]=$log['doc_type'];
					 $j++;
				 }
 
			if(isset($_GET['search'])){
				$_SESSION['key']=0;
					 $list=array();
					 $listIDtem=array();
					 $listTypetem=array();
					 
					 echo '   <script type="text/javascript">
	$(document).ready(function(){
    	$("#p1").empty();
        $("#p2").empty();
        $("#p3").empty();
        $("#p4").empty();
        $("#p5").empty();
        $("#p6").empty();
        $("#p7").empty();
        $("#p8").empty();
        $("#p9").empty();
        $("#p10").empty();
		});
</script>';
				if(isset($_GET['q'])!=''){//Search
					$j=0;
 					$q=$_GET['q'];
 					$regex=array('name' => new MongoRegex("/$q/i"),'username'=>$_SESSION['username']);//จะเหมือนกับคำสั่ง LIKE '%$q%'
 					$cursor = $collection->find($regex);//หมายถึง ให้เมธอด fine ค้นหา ตามคีย์เวิร์ดที่เป็นพารามิเตอร์
					$_SESSION['total']=$cursor->count();
					foreach($cursor as $log){
					 $listtem[$j]=$log['name'];
					 //echo $listtem[$j];
					 $listIDtem[$j]=$log['_id'];
					 $listTypetem[$j]=$log['doc_type'];
					 $j++;
				 }
					}
				 }

				 
				 
				 $list=array();
				 $listID=array();
				 $listType=array();
				 $t=0;
				 for($a=$j-1;$a>=0;$a--){
					 $list[$t]=$listtem[$a];
					 $listID[$t]=$listIDtem[$a];
					 $listType[$t]=$listTypetem[$a];	 
					 $t++;
				 }
				 $i=$_SESSION['key'];
				 echo $i."   ";		
 	?>
<title>Weblog</title>
</head>
<body>

<div align="center">
  <img  src="31344686_1704141333000568_3657415830821404672_n.png" width="100%" height="200" >
  </div>
 <br>
   <form  method="get"> 
  <a href="index.php"  class="btn btn-primary" style="margin-left:560px">Home</a>
  <a href="create.php" class="btn btn-success" style="margin-left:30px" >สร้างกระทู้</a> 
  <a href="#" class="btn btn-danger" id="manage" >จัดการ User</a> 
&ensp;&ensp;&ensp; 
<a href="user.php?set=true" class="btn btn-info">User Home</a> &ensp;&ensp;&ensp;
<button type="button" class="btn btn-primary"> แจ้งเตือน <span class="badge badge-light">9</span> <span class="sr-only">unread messages</span></button>
&ensp;&ensp;&ensp;
<button type="button" class="btn btn-info">Profile</button>
&ensp;&ensp;&ensp;
<a href="login.php" class="btn btn-dark">Logout </a>
 </P>
 <br>
 <center >
  <label  for="q"></label><b style="color:#F00;">ค้นหาข้อมูล</b>
  <input type="text" name="q" id="q"  />
  <input type="submit" class="btn btn-light" name="search" id="search" value="ค้นหา" />
  </center>

<p>&nbsp;</p>
<table width="836" border="0" align="center" >
  <tr valign="top">
    <td width="732" height="101" ><table width="200" border="0">
      <tr>
        <td valign="top" class="btn-warning" style="padding:10px;border-radius:10px;border-style:solid;border-color:#000"> <b> <?php echo "สวัสดี ".$_SESSION['username'];?>  </b>&nbsp;</td>      
       
<br>
      </tr>
             

    </table> 
    
   </td>
    <td width="97"  name="manage" > 
	</td>
  </tr>
  <tr>
  
    <td colspan="2"><button type="button" class="btn btn-outline-warning">กระทู้ที่โพสต์</button>
<button type="button" class="btn btn-outline-danger">กระทู้ที่ติดตาม</button>
<button type="button" class="btn btn-outline-dark">กระทู้ที่คอมเม้น</button>&nbsp;</td>
  </tr>
  <tr>
    <td height="42">
      <br>
 <div id="p1" class="alert alert-primary" role="alert"><a href="#"><?php if(isset($list[$i])) {echo "  <".$listType[$i].">  ".$list[$i];} ?></a></div>
        <div id="p2" class="alert alert-secondary" role="alert"> <a href="#"><?php if(isset($list[$i+1])){echo "  <".$listType[$i+1].">  ".$list[$i+1];} ?></a></div>
        <div id="p3" class="alert alert-success" role="alert"><a href="#"><?php if(isset($list[$i+2])){echo "  <".$listType[$i+2].">  ".$list[$i+2];} ?></a></div>
        <div id="p4" class="alert alert-danger" role="alert"> <a href="#"><?php if(isset($list[$i+3])) {echo "  <".$listType[$i+3].">  ".$list[$i+3];} ?></a></div>
        <div id="p5" class="alert alert-warning" role="alert"> <a href="#"><?php if(isset($list[$i+4])) {echo "  <".$listType[$i+4].">  ".$list[$i+4];} ?></a></div>
        <div id="p6" class="alert alert-info" role="alert"> <a href="#"><?php if(isset($list[$i+5])) {echo "  <".$listType[$i+5].">  ".$list[$i+5];} ?> </a></div>
        <div id="p7" class="alert alert-light" role="alert"> <a href="#"><?php if(isset($list[$i+6])) {echo "  <".$listType[$i+6].">  ".$list[$i+6];} ?></a></div>
        <div id="p8" class="alert alert-dark" role="alert"> <a href="#"><?php if(isset($list[$i+7])) {echo "  <".$listType[$i+7].">  ".$list[$i+7];} ?></a></div>
        <div id="p9" class="alert alert-secondary" role="alert"> <a href="#"><?php if(isset($list[$i+8])) {echo "  <".$listType[$i+8].">  ".$list[$i+8];} ?></a></div>
      	<div id="p10" class="alert alert-success" role="alert"> <a href="#"><?php if(isset($list[$i+9])) {echo "  <".$listType[$i+9].">  ".$list[$i+9];} ?></a></div>
  &nbsp;
  <nav style="float:right" aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="user.php?hello1=true">Previous</a></li>
      <li class="page-item"><a class="page-link" href="user.php?hello2=true">Next</a></li>
      </ul>
      </form>
  </nav></td>
  </tr>
</table>
</nav>
<?php  $t=0;
				 for($a=$j-1;$a>=0;$a--){
					 echo $list[$t];
					 $t++;
				 } ?>




<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body>
</html>