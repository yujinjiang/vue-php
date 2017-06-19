<?php
/*
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "userpassfinal";
$conn = new mysqli($server, $username, $password, $dbname);
*/


 // echo json_encode($arr);
 //  $times = date("Y-n-j-G-i-s");
   
try{
$pdo=new PDO("mysql:host=localhost;dbname=vue","root","root");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
{
	  
	  echo $e->getMessage();
	  exit();
};
$location=1;


//给数据库里面插入数据


$file = array();
for($i=1; $i < 6; $i++)
{
	if($_FILES["file$i"]["name"] <> "")
	{
		$file[$i] = "upload/" . md5_file($_FILES["file$i"]["tmp_name"]) . "." . end(explode(".", $_FILES["file$i"]["name"]));
		move_uploaded_file($_FILES["file$i"]["tmp_name"], $file[$i]);
	}
};





$flag=1;
if($flag)
{  
	 try{
	 $stmt = $pdo->prepare("INSERT INTO frienddata(count,title,maintext,pic1,pic2,pic3,pic4,pic0)
    VALUES (:count, :title,:maintext,:pic1,:pic2,:pic3,:pic4,:pic0)");
    $stmt->bindParam(':count', $_POST["count"]);
    $stmt->bindParam(':title', $_POST["title"]);
    $stmt->bindParam(':maintext',$_POST["maintext"]);
    $stmt->bindParam(':pic1',$file[1]);
    $stmt->bindParam(':pic2',$file[2]);
    $stmt->bindParam(':pic3',$file[3]);
    $stmt->bindParam(':pic4',$file[4]);
    $stmt->bindParam(':pic0',$file[5]);
    $stmt->execute();
	
}catch(PDOException $e)
	  {
		  echo $e->getMessage();
		  exit();
	  }
}  
   echo $_FILES["file1"]["name"];
echo $file[1];
/*
Header('HTTP/1.1 301 Moved Permanently');
Header('Location:./user-home.html');
*/
?>
