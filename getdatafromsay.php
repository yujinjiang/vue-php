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
    $sql='select title,maintext,count,pic0,pic1,pic2,pic3,pic4 from say';
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
		  'pic0'=>$row['pic0'],
		  'pic1'=>$row['pic1'],
		  'pic2'=>$row['pic2'],
		  'pic3'=>$row['pic3'],
		  'pic4'=>$row['pic4']
	  );
  }
 // print_r()
 // print_r()
 // print_r()
 print_r(json_encode($inner));
  
?>