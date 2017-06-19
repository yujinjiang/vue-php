<?php   
try{
$pdo=new PDO("mysql:host=localhost;dbname=vue","root","root");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
{
	  
	  echo $e->getMessage();
	  exit();
};
$location=1;
$count = $_POST['count'];
$file = $_FILES["file"]["name"];



$filename = [];
$filename = $_FILES["file"]["name"];

/*
try{
	$sfile="upload/" . md5_file($_FILES["file"]["tmp_name"]) . "." . end(explode(".", $filename));
	 move_uploaded_file($_FILES["file"]["tmp_name"], $sfile);
	
}catch(error){
	  echo 1;
	
}   */

//上传文件的脚步
	 $sfile="upload/" . md5_file($_FILES["file"]["tmp_name"]) . "." . end(explode(".", $filename));
	 move_uploaded_file($_FILES["file"]["tmp_name"], $sfile);
	
//上传文件的脚本
$flag=1;
if($flag)
{  
	 try{
	 $stmt = $pdo->prepare("INSERT INTO userpassselfpic(count,piclocation)
    VALUES (:count,:piclocation)");
    $stmt->bindParam(':count', $_POST["count"]);
    $stmt->bindParam(':piclocation',$sfile);
    $stmt->execute();
	
}catch(PDOException $e)
	  {
		//  echo $e->getMessage();
		  exit();
	  }
}  
echo $sfile;

?>
