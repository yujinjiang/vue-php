<?php
  //echo $_GET["value1"];
  try{
  $pdo=new PDO("mysql:host=localhost;dbname=vue","root","root");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo $_GET["value2"];
 
  // $pa=$_GET["value2"];
   
  
  }catch(PDOException $e)
  {
	  echo $e->getMessage();
	  exit();
  };
  try{
    $sql='select name,count,password from counters';
		$resul=$pdo->query($sql);
  }catch(PDOException $e){
	  echo $e->getMessage();
	  exit();
  };
    foreach($resul as $row)
  {
	  $inner[]=array(
	      'name'=>$row['name'],
		  'count'=>$row['count'],
		  'password'=>$row['password']
	  );
  }
  $length=count($inner);
  for($num=0;$num<$length;$num++)
  {
	  if($inner[$num]['count']==$_GET["count"])
	  {
		 if($inner[$num]["password"]==$_GET["pas"])    //$_GET["value3"]
		 { 
	     echo $inner[$num]["name"];
	      }
	     else{
			 echo 0;
		 }
	     exit();
	  }
	
  }
  
?>