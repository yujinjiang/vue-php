
<?php
/*	echo $_GET["value1"];
	echo $_GET["value2"];
	echo $_GET["value3"];
   echo "123";
  
  echo "123";
 */
 
 // echo json_encode($arr);
  try{
  $pdo=new PDO("mysql:host=localhost;dbname=vue","root","root");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql="select count from counters";
  $result=$pdo->query($sql);
  }catch(PDOException $e)
  {
	  
	  echo $e->getMessage();
	  exit();
  }
  while($row=$result->fetch())
  {
	  if($row[0]==$_GET["count"])
	  {
		  $flag=0;
		 // echo $flag;
		  exit();
	  } 
  }
  
  $flag=1;
  if($flag)
  {  
	 try{
	 $stmt = $pdo->prepare("INSERT INTO counters(name,count,password)
    VALUES (:name, :count, :password)");
    $stmt->bindParam(':name', $_GET["name"]);
    $stmt->bindParam(':count', $_GET["count"]);
    $stmt->bindParam(':password',$_GET["pas"]);
    $stmt->execute();
	echo "ok";
  }catch(PDOException $e)
	  {
		  echo $e->getMessage();
		  exit();
	  }
  }  
   echo $flag;
  
?>