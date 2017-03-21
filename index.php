<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php 

$conexion = mysql_connect("localhost", "root", "");
if($conexion){
	//echo 'conexion exitosa';

	mysql_select_db("emoticones");

	$cathLogQuery = mysql_query("SELECT users.username, chatlog.message FROM chatlog inner join users on users.id = chatlog.from");

	while($row = mysql_fetch_assoc($cathLogQuery))
	{
		$from = $row['username'];
		$message = $row['message'];

		$queryicons = mysql_query("SELECT * from emoticons");
		while ($row = mysql_fetch_assoc($queryicons)) {
			$chars = $row['chars'];
			$imgTag = "<img src='img/".$row['image']."' width='20px' style='margin-bottom: -5px'/>";
			$message = str_replace($chars, $imgTag, $message);
		}
# code...
		echo 'Para: '.$from.'</br>';
		echo 'Mensaje: '.$message.'</br></br>';
	}

}else{
	echo "algo sucedio mal";
}
 ?>

</body>
</html>