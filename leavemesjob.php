 <?php
try{
$pdo=new PDO("mysql:host=localhost;dbname=vue","root","root");
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
	 $stmt = $pdo->prepare("INSERT INTO leavemes(too,maintext,form)
    VALUES (:too,:maintext,:form)");
    $stmt->bindParam(':too', $_POST["to"]);
    $stmt->bindParam(':maintext',$_POST["maintext"]);
    $stmt->bindParam(':form',$_POST["form"]);
    $stmt->execute();
	
}catch(PDOException $e)
	  {
		  echo $e->getMessage();
		  exit();
	  }
}  
echo 'ok';
?>
