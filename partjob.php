 <?php
try{
$pddlasadlkjlajsldklask=new PDO("mysql:host=localhost;dbname=vue","root","root");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
{
	  
	  echo $e->getMessage();
	  exit();
};
$flag=1;
if($flag)
{  
	 try{
	 $stmt = $pdo->prepare("INSERT INTO partjob(title,maintext,count)
    VALUES (:title,:maintext,:count)");
    $stmt->bindParam(':title', $_POST["title"]);
    $stmt->bindParam(':maintext',$_POST["maintext"]);
    $stmt->bindParam(':count',$_POST["count"]);
    $stmt->execute();
	
}catch(PDOException $e)
	  {
		  echo $e->getMessage();
		  exit();
	  }
}  
echo 'ok';
?>
