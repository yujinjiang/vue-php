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
    $sql='select title,maintext,count,name,location from music';
		$resul=$pdo->query($sql);
   }catch(PDOException $e){
	  echo $e->getMessage();
	  exit();
  };
    foreach($resul as $row)
  {
	  $inner[]=array(
	    'title'=>$row['title'],
		  'maintext'=>$row['maintext'],
		  'count'=>$row['count'],
		  'name'=>$row['name'],
		  'location'=>$row['location']
	  );
  }



 print_r(json_encode($inner));
  
?>