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
    </style>
       <?php  
	  		try{
	  			require_once __DIR__ . "/vendor/autoload.php";
				session_start();
				session_destroy();
			    $connection= new MongoClient("mongodb://chain:chain555@ds245082.mlab.com:45082/webblog");
 				 $db= $connection->webblog;
  			 $collection=$db->user;
				 if((isset($_POST['username'])&&isset($_POST['password']))){
				 $doc=array("username"=>$_POST['username'],"password"=>$_POST['password']);
				 
				 $cursor=$collection->find($doc);
				 foreach($cursor as $log){
					 
					 if((isset($log['username'])&&isset($log['password']))){
						 session_start();
						 $_SESSION['username']=$_POST['username'];
						 $_SESSION['status']=$log['status'];
						header('Location:index2.php');
						exit;
					 }
			
				
				 }	
			
				  $message = "Username and/or Password incorrect.\\nTry again.";
 					 echo "<script type='text/javascript'>alert('$message');</script>";		} 
				 
			}catch(Exception $e){
			}
 	?> 
<script>
if(window.back()){
	header('Location:login.php');
}
</script>
  
    <title>Weblog</title>
</head>
  <body>
  <img  src="31344686_1704141333000568_3657415830821404672_n.png" width="100%" height="200" >
    &ensp;&emsp;&ensp;&ensp;
    <table width="200" border="0" align="center" cellpadding="50">
      <tr>
        <th  nowrap ><form name="form1" method="post">
          <div class="form-group">
            <h3> <label class="text-primary">Username</label></h3>
            <input  name="username" class="form-control"  placeholder="Username"
  			</div>
          <div class="form-group">
           <h3> <label  class="text-primary">Password</label></h3>
            <input name="password" type="password" class="form-control" placeholder="Password">
          </div>
          
          <button  type="submit" class="btn btn-primary" >Login</button>
  &ensp;&emsp;&ensp;&ensp;
  <a href="register.php" class="btn btn-primary" action="register.php">สมัครสมาชิก</a>
        </form></th>
      </tr>
  </table>
  
  <p>&nbsp;</p>
  <p>
      <script language="javascript">

// ENTER TEXT BELOW. CAN *NOT* INCLUDE NORMAL HTML CODE.
var text='WELCOME';
var delay=30;              // ตั้งค่าความเร็วในการกระเด้ง (ยิ่งเลขน้อยยิ่งเร็ว)
var txtw=40;               // ตั้งค่าความห่างระหว่างตัวอักษร 
var xoff=640;               // ตำแหน่งให้แสดงตัวอักษรจากด้านบนซ้าย
var yoff=530;               // ตำแหน่งให้แสดงตัวอักษรจากด้านบน
var sampleinc=0.3;
var amplitude=35;          // ความสูงที่ตัวอักษรษรกระเด้งถึง (ยิ่งเลขมากยิ่งสูง
var mousefollow=false;
var beghtml='<h1>';
var endhtml='</h1>';
//********** NO NEED TO EDIT BELOW HERE **********\\

ns4 = (navigator.appName.indexOf("Netscape")>=0 && document.layers)? true : false;
ie4 = (document.all && !document.getElementById)? true : false;
ie5 = (document.all && document.getElementById)? true : false;
ns6 = (document.getElementById && navigator.appName.indexOf("Netscape")>=0 )? true: false;
var txtA=new Array();
text=text.split('');
var t='';
var ex=sampleinc;
var mousex=0;
var mousey=0;
for(i=1;i<=text.length;i++){
t+=(ns4)? '<layer name="txt'+i+'" top="-1000" left="0" width="'+txtw+'" height="1">' : '<div id="txt'+i+'" style="position:absolute; top:-1000px; left:0px; height:1px; width:'+txtw+'; visibility:visible;">';
t+=beghtml+text[i-1]+endhtml;
t+=(ns4)? '</layer>' : '</div>';
}
document.write(t);

function adjmousepos(evt){
mousex=xoff+((ie4||ie5)?event.clientX+document.body.scrollLeft:evt.pageX);
mousey=yoff+((ie4||ie5)?event.clientY+document.body.scrollTop:evt.pageY);
}

function getidleft(id){
if(ns4)return id.left;
else return parseInt(id.style.left);
}

function getidtop(id){
if(ns4)return id.top;
else return parseInt(id.style.top);
}

function getwindowwidth(){
if(ie4||ie5)return document.body.clientWidth+document.body.scrollLeft;
else return window.innerWidth+pageXOffset;
}

function moveid(id,x,y){
if(ns4)id.moveTo(x,y);
else{
id.style.left=x+'px';
id.style.top=y+'px';
}}

function movetxts(){
for(i=text.length;i>1;i=i-1){
if(getidleft(txtA[i-1])+txtw*2>=getwindowwidth()){
moveid(txtA[i-1],0,-1000);
moveid(txtA[i],0,-1000);
}else moveid(txtA[i], getidleft(txtA[i-1])+txtw, getidtop(txtA[i-1]));
}
moveid(txtA[1],x1,y1);
ex=ex+sampleinc;
}

function movetxts(){
for(i=text.length;i>1;i=i-1){
if(getidleft(txtA[i-1])+txtw*2>=getwindowwidth()){
moveid(txtA[i-1],0,-1000);
moveid(txtA[i],0,-1000);
}else moveid(txtA[i], getidleft(txtA[i-1])+txtw, getidtop(txtA[i-1]));
}
moveid(txtA[1],xoff+mousex,yoff+mousey+(Math.sin(ex)*amplitude)+Math.abs(amplitude));
ex=ex+sampleinc;
}

window.onload=function(){
for(i=1;i<=text.length;i++)txtA[i]=(ns4)?document.layers['txt'+i]:(ie4)?document.all['txt'+i]:document.getElementById('txt'+i);
setInterval('movetxts()',delay);
if(mousefollow){
if(ns4)document.captureEvents(Event.MOUSEMOVE);
document.onmousemove=adjmousepos;
}}

      </script>;
      <br>
      <br>
      <br>
      <marquee direction="left">Contact : Admin : Chainrocker Email : chainrock55@gmail.com Tel. : 088-063-0106</marquee>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </p>
</body>
</html>