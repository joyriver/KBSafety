<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Gmail Database</title>
<script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js">
</script>
</head>

<body>

<form action="" method="post" name="myform">
 <tr>
    <td width="605" height="51" bgcolor="#CC99FF"><div align="center">Please input Account keywords
	  <input name="txt_book" type="text" id="txt_book" size="25" value="<?php echo $_POST[txt_book];?>"/>&nbsp;
	  <input type="submit" name="Submit" value="QUERY">
	  <div></div></td>
	  <tr></tr>
 </tr>  
</form>

<?php
// include_once('fenye.php');

//  echo "my first php shell!";
//  echo "test sqlite!";
  $db = new PDO("sqlite:orderman.db");
  if(!$db){
  	echo $db->lastErrorMsg();
  }else{
  	echo "Open KB database successfully\n";
  }
  
//	  $sql = $db->query("SELECT * FROM MailLists WHERE ACC!=''");
//    $sql = $page->entrance('MailLists',5);
if($_POST[Submit] == "QUERY"){
   $txt_book = $_POST[txt_book];
   if($txt_book !='')
   {
 //  $sql = $db->query("SELECT * FROM MailLists WHERE ACC like '%".trim($txt_book)."%'");
//   $tj = "WHERE ACC like '%".trim($txt_book)."%'";
//   $sql = $page->entrance('MailLists',5);

/*
 $page=new SqlitePage();
 $res=$page->entrance('MailLists',5,$tj);
 */
  echo "<table border='1' cellspacing='0' cellpadding='1'>

 <tr>
 <th>ACC</th>
 <th>From</th>
 <th>To</th>
 <th>Date</th>
 <th>Subject</th>
 <th>Content</th>
 </tr>";
 echo "<br>";
 
 $res = $db->query("SELECT * FROM MailLists WHERE FromS like '%".trim($txt_book)."%'")->fetchAll();
foreach ($res as $key=>$info) {
	//var_dump($row);
	
	 echo "<tr>";
  echo "<td>".$info[ACC]."</td>";
  echo "<td>".$info[FromS]."</td>";
  echo "<td>".$info[ToS]."</td>";
  echo "<td>".$info[DateS]."</td>";
  echo "<td>".$info[SubjectS]."</td>";
  echo "<td>".$info[Content]."</td>";
  echo "</tr>";  
	// echo $row['ACC']." ".$row['orderId']." ".$row['price']."\n\r";
}
}
  echo "</table>";
}
//  echo $page->page_bar();
?>
<script type="text/javascript">
//  $("#txt_book").val("100CA"); 
 </script>
</body>

</html>
