<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Praise</title>
</head>
<body>

<form action="" method="post" name="myform">
 <tr>
    <td width="605" height="51" bgcolor="#CC99FF"><div align="center">Please input keywords
	  <input name="txt_book" type="text" id="txt_book" size="25">&nbsp;
	  <input type="submit" name="Submit" value="QUERY">
	  <div></div></td>
	  <tr></tr>
 </tr>
  
</form>

<?php
$link = mysql_connect("localhost","root","root") or die("link failed!".mysql_error());
mysql_select_db("orders",$link);
mysql_query("set names gb2312");

$sql = mysql_query("select * from jinxi where price!=''");
if($_POST[Submit] == "QUERY"){
   $txt_book = $_POST[txt_book];
   if($txt_book !='')
   $sql = mysql_query("select * from jinxi where price like '%".trim($txt_book)."%'");
}
 
 echo "<table border='1' cellspacing='0' cellpadding='1'>

 <tr>
 <th>sku</th>
 <th>sku</th>
 <th>price</th>
 <th>price</th>
 <th>price</th>
 <th>COST</th>
 </tr>";
 echo "<br>";
 while($info = mysql_fetch_array($sql)){
  echo "<tr>";
  echo "<td>".$info[sku]."</td>";
  echo "<td>".$info[sku]."</td>";
  echo "<td>".$info[price]."</td>";
  echo "<td>".$info[price]."</td>";
  echo "<td>".$info[price]."</td>";
  echo "<td>".$info[COST]."</td>";
  echo "</tr>";
	}
  echo "</table>";
  mysql_close($link);
?>
</body>
</html>
