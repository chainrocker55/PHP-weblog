<?php
  $connection= new MongoClient("mongodb://chain:chain555@ds245082.mlab.com:45082/webblog");
  $db= $connection->webblog;
  $collection=$db->user;
  $collection->insert(array("username"=>"chain","password"=>"123","name"=>"chainrocker","gender"=>"ชาย"));
?>
