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
	background-image: url(1511.jpg);
	background-size:cover;
	background-attachment:fixed;
	
}
    </style>
    
    
     <?php
     			ini_set("mongo.native_long", 0);
				ini_set("mongo.long_as_object", 1);
	  			$check=0;
				session_start();
				$_SESSION['key']=0;
				$_SESSION['total']=0;
				$_SESSION['type']="";
				$_SESSION['idforum']=-1;
				  $connection= new MongoClient("mongodb://chain:chain555@ds245082.mlab.com:45082/webblog");
  	  			$db= $connection->webblog;
				 
				 $collection=$db->alert;
				 $doc=array('forumuser'=>$_SESSION['username']);
				 $cursor = $collection->find($doc);
				 $_SESSION['num']=$cursor->count();
				 
  				 $collection=$db->forum;
 				 $cursor = $collection->find();
				 $totalRec=$cursor->count();
				 $i=0;
				 $j=0;
				 $listtem[]=array();
				 $listIDtem[]=array();
				 $listTypetem[]=array();
				  unset($listtem);
				 unset($listIDtem);
				 unset($listTypetem);
				 foreach($cursor as $log){
					 $listtem[$j]=$log['name'];
					 $listIDtem[$j]=$log['_id'];
					 $listTypetem[$j]=$log['doc_type'];
					 $j++;
				 }
				 if(isset($_GET['search'])){
					 $listtem=array();
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
 					$regex=array('name' => new MongoRegex("/$q/i"));//จะเหมือนกับคำสั่ง LIKE '%$q%'
 					$cursor = $collection->find($regex);//หมายถึง ให้เมธอด fine ค้นหา ตามคีย์เวิร์ดที่เป็นพารามิเตอร์
					foreach($cursor as $log){
					 $listtem[$j]=$log['name'];
					 //echo $listtem[$j];
					 $listIDtem[$j]=$log['_id'];
					 $listTypetem[$j]=$log['doc_type'];
					 $j++;
				 }
					}
				 }
				 
				 
				  if(isset($_GET['tob10'])){
					  $check=1;
					 $listtem=array();
					 $listIDtem=array();
					 $listTypetem=array();
					  unset($listtem);
				 unset($listIDtem);
				 unset($listTypetem);
					 
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
				
					$j=0;
 					$cursor = $collection->find()->sort(array('comment'=>-1))->limit(10);//หมายถึง ให้เมธอด fine ค้นหา ตามคีย์เวิร์ดที่เป็นพารามิเตอร์
					foreach($cursor as $log){
					 $listtem[$j]=$log['name'];
					 //echo $listtem[$j];
					 $listIDtem[$j]=$log['_id'];
					 $listTypetem[$j]=$log['doc_type'];
					 $j++;
					 
				 }
					}
				   if(isset($_GET['tob11'])){
					  $check=1;
					 $listtem=array();
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
				
					$j=0;
 					$cursor = $collection->find()->sort(array('like'=>-1))->limit(10);//หมายถึง ให้เมธอด fine ค้นหา ตามคีย์เวิร์ดที่เป็นพารามิเตอร์
					foreach($cursor as $log){
					 $listtem[$j]=$log['name'];
					 //echo $listtem[$j];
					 $listIDtem[$j]=$log['_id'];
					 $listTypetem[$j]=$log['doc_type'];
					 $j++;
					 
				 }
					}
				 
				 
				 
				 
				 unset($list);
				 unset($listID);
				 unset($listType);
				 $t=0;
				 if($check==0){
				 for($a=$j-1;$a>=0;$a--){
					 $list[$t]=$listtem[$a];
					 $listID[$t]=$listIDtem[$a];
					 $listType[$t]=$listTypetem[$a];
					 $t++;
				 }
				 }else{
				 for($a=0;$a<$j;$a++){
					 $list[$a]=$listtem[$a];
					 $listID[$a]=$listIDtem[$a];
					 $listType[$a]=$listTypetem[$a];
					 $t++;
				 }
				 }
				
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
&ensp;&ensp;&ensp; 
<a href="userhome.php?set=true" class="btn btn-info">User Home</a> &ensp;&ensp;&ensp;
<a href="alert.php" type="button" class="btn btn-primary"> แจ้งเตือน <span class="badge badge-light"><?php echo $_SESSION['num'] ?></span> <span class="sr-only"></span></a>
&ensp;&ensp;&ensp;
<a href="profile.php" class="btn btn-light">Profile </a>
&ensp;&ensp;&ensp;
<a href="login.php" class="btn btn-dark">Logout </a>
 </P>
  
  <br>
  <br>
  <center >
  <label  for="q"></label><b style="color:#F00;">ค้นหาข้อมูล</b>
  <input type="text" name="q" id="q"  />
  <input type="submit" class="btn btn-light" name="search" id="search" value="ค้นหา" />
  </center>

  
<p>&nbsp;</p>
<div style="margin-left:200px">
 <input type="submit" class="btn btn-danger btn-lg" name="tob10" id="top10" value="Top 10 Comment" />
 <input type="submit" class="btn btn-primary btn-lg" name="tob11" id="top11" value="Top 10 Like" />

</div>

  <table width="1344" border="0">
  
    <tr>
      <td width="236">
      &ensp;<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script></td>
      <td width="735" valign="top">&ensp; &ensp;&ensp;&ensp; &ensp;&ensp;&ensp;

        <div id="p1" class="alert alert-primary" role="alert"><a href="look.php?set= <?php echo $listID[$i]."\"";?>><?php if(isset($list[$i])) {echo "  <font color=\"red\"><".$listType[$i]."> </font> ".$list[$i];} ?></a></div>
        <div id="p2" class="alert alert-secondary" role="alert"><a href="look.php?set= <?php echo $listID[$i+1]."\"";?>><?php if(isset($list[$i+1])){echo "<font color=\"red\">  <".$listType[$i+1]."> </font> ".$list[$i+1];} ?></a></div>
        <div id="p3" class="alert alert-success" role="alert"><a href="look.php?set= <?php echo $listID[$i+2]."\"";?>><?php if(isset($list[$i+2])){echo "  <font color=\"red\"><".$listType[$i+2]."></font>  ".$list[$i+2];} ?></a></div>
        <div id="p4" class="alert alert-danger" role="alert"> <a href="look.php?set= <?php echo $listID[$i+3]."\"";?>><?php if(isset($list[$i+3])) {echo "  <font color=\"red\"><".$listType[$i+3]."> </font> ".$list[$i+3];} ?></a></div>
        <div id="p5" class="alert alert-warning" role="alert"> <a href="look.php?set= <?php echo $listID[$i+4]."\"";?>><?php if(isset($list[$i+4])) {echo "<font color=\"red\">  <".$listType[$i+4]."> </font> ".$list[$i+4];} ?></a></div>
        <div id="p6" class="alert alert-info" role="alert"> <a href="look.php?set= <?php echo $listID[$i+5]."\"";?>><?php if(isset($list[$i+5])) {echo "  <font color=\"red\"><".$listType[$i+5]."> </font> ".$list[$i+5];} ?> </a></div>
        <div id="p7" class="alert alert-light" role="alert"> <a href="look.php?set= <?php echo $listID[$i+6]."\"";?>><?php if(isset($list[$i+6])) {echo "  <font color=\"red\"><".$listType[$i+6]."> </font> ".$list[$i+6];} ?></a></div>
        <div id="p8" class="alert alert-dark" role="alert"> <a href="look.php?set= <?php echo $listID[$i+7]."\"";?>><?php if(isset($list[$i+7])) {echo " <font color=\"red\"> <".$listType[$i+7]."> </font> ".$list[$i+7];} ?></a></div>
        <div id="p9" class="alert alert-secondary" role="alert"> <a href="look.php?set= <?php echo $listID[$i+8]."\"";?>><?php if(isset($list[$i+8])) {echo "<font color=\"red\">  <".$listType[$i+8].">  </font>".$list[$i+8];} ?></a></div>
      	<div id="p10" class="alert alert-success" role="alert"> <a href="look.php?set= <?php echo $listID[$i+9]."\"";?>><?php if(isset($list[$i+9])) {echo " <font color=\"red\"> <".$listType[$i+9]."> </font> ".$list[$i+9];} ?></a></div>
      
      <td width="94" valign="top">&nbsp;</td>
      <th width="261" valign="top">&ensp;        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <div class="list-group"> 
          <p><h3 class="btn-warning" style="padding:10px;border-radius:10px;border-style:solid;border-color:#000"> ประเภทกระทู้ </h3></p>
          <p><a href="select.php?story=true" class="list-group-item list-group-item-action">บทความ</a>            </p>
          <p><a href="select.php?news=true" class="list-group-item list-group-item-action">ข่าว</a>            </p>
          <p><a href="select.php?que=true" class="list-group-item list-group-item-action">คำถาม</a>            </p>
          <p><a href="select.php?review=true" class="list-group-item list-group-item-action ">รีวิว</a></p>
          <p> <a href="select.php?store=true" class="list-group-item list-group-item-action " >ขายของ</a> </p></div>
         </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script></th>
    </tr>
  </table>
  <table width="200" border="0" align="right">
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table> 
  </div>
  <br>
  <br>
  <br>
  <br>
  <br> <br>
  <br>
  <br>
   </form>


</body>
</html>