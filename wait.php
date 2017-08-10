<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Wait For God</title>
</head>

<body>
<form action="" method="post" name="myform">
<tr>
    <td width="605" height="51" bgcolor="#CC99FF"><div align="center">Please input QUERY keywords
	  <input name="txt_book4" type="text" id="txt_book4" size="25">&nbsp;
	  <input type="submit" name="Submit" value="QUERY">
	  <div></div></td>
	  <tr></tr>
 </tr>
 </form>
 <?php
 echo "my first php shell!";
  echo "test sqlite!";
  $db = new PDO("sqlite:temp1.db");
  if(!$db){
  	echo $db->lastErrorMsg();
  }else{
  	echo "Open database successfully\n";
  }
   $sql = $db->query("SELECT * FROM Qianen WHERE AGE!=''");
if($_POST[Submit] == "QUERY"){
   $txt_book4 = $_POST[txt_book4];
   if($txt_book4 !='')
   $sql = $db->query("SELECT * FROM Qianen WHERE AGE like '%".trim($txt_book4)."%'");
}
  
  echo "<table border='1' cellspacing='0' cellpadding='1'>

 <tr>
 <th>Name</th>
 <th>Age</th>
 <th>Sex</th>
 </tr>";
 echo "<br>";
 
$results = $db->query("SELECT * FROM Qianen WHERE AGE like '%".trim($txt_book4)."%'")->fetchAll();
foreach ($results as $key=>$info) {
	//var_dump($row);
	
	 echo "<tr>";
  echo "<td>".$info[NAME]."</td>";
  echo "<td>".$info[AGE]."</td>";
  echo "<td>".$info[SEX]."</td>";
  echo "</tr>";  
	// echo $row['ACC']." ".$row['orderId']." ".$row['price']."\n\r";
}
  echo "</table>"
 ?>
</body>
</html>
